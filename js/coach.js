{
    class Slide {
        constructor(el) {
            this.DOM = {el: el};
            this.DOM.imgWrap = this.DOM.el.querySelector('.slideImgWrap');
            this.DOM.img = this.DOM.imgWrap.querySelector('.slideImg');
            this.DOM.revealer = this.DOM.imgWrap.querySelector('.slideImgRev');
            this.DOM.title = this.DOM.el.querySelector('.slideTitle');
            this.DOM.titleBox = this.DOM.title.querySelector('.slideBox');
            this.DOM.titleInner = this.DOM.title.querySelector('.slideTitleInner');
            this.DOM.subtitle = this.DOM.el.querySelector('.slideSub');
            this.DOM.subtitleBox = this.DOM.subtitle.querySelector('.slideBox');
            this.DOM.subtitleInner = this.DOM.subtitle.querySelector('.slideSubInner');
            this.DOM.explore = this.DOM.el.querySelector('.slideMore');
            this.config = {
                revealer: {
                    speed: {hide: 0.5, show: 0.7},
                    ease: {hide: 'Quint.easeOut', show: 'Quint.easeOut'}
                }
            };
            this.initEvents();
        }
        initEvents() {
            this.mouseenterFn = () => {
                if ( this.isPositionedCenter() ) {
                    this.zoom({scale: 1.2, speed: 2, ease: 'Quad.easeOut'});
                }
            };
            this.mouseleaveFn = () => {
                if ( this.isPositionedCenter() ) {
                    this.zoom({scale: 1.1, speed: 2, ease: 'Quad.easeOut'});
                }
            };
            this.DOM.explore.addEventListener('mouseenter', this.mouseenterFn);
            this.DOM.explore.addEventListener('mouseleave', this.mouseleaveFn);
        }
        setCurrent(hideBefore = true) {
            this.isCurrent = true;

            if ( hideBefore ) {
                this.showRevealer({animation: false});
                this.DOM.titleInner.style.opacity = 0;
                this.DOM.subtitleInner.style.opacity = 0;
                this.DOM.titleBox.style.opacity = 0;
                this.DOM.subtitleBox.style.opacity = 0;
                this.DOM.explore.style.opacity = 0;
            }

            this.DOM.el.classList.add('coSlide--current', 'coSlide--visible');
        }
        setLeft(hideBefore = true) {
            this.isRight = this.isCurrent = false;
            this.isLeft = true;
            if ( hideBefore ) {
                this.resetLeftRight();
            }
            this.DOM.el.classList.add('coSlide--left', 'coSlide--visible');
        }
        setRight(hideBefore = true) {
            this.isLeft = this.isCurrent = false;
            this.isRight = true;
            if ( hideBefore ) {
                this.resetLeftRight();
            }
            this.DOM.el.classList.add('coSlide--right', 'coSlide--visible');
        }
        resetLeftRight() {
            this.showRevealer({animation: false});
            this.DOM.titleInner.style.opacity = 0;
            this.DOM.titleInner.style.transform = 'none';
        }
        isPositionedRight() {
            return this.isRight;
        }
        isPositionedLeft() {
            return this.isLeft;
        }
        isPositionedCenter() {
            return this.isCurrent;
        }
        showRevealer(opts = {}) {
            return this.toggleRevealer('hide', opts);
        }
        hideRevealer(opts = {}) {
            return this.toggleRevealer('show', opts);
        }
        toggleRevealer(action, opts) {
            return new Promise((resolve, reject) => {
                if ( opts.animation ) {
                    TweenMax.to(this.DOM.revealer, opts.speed || this.config.revealer.speed[action], {
                        delay: opts.delay || 0,
                        ease: opts.ease || this.config.revealer.ease[action],
                        startAt: action === 'hide' ? {y: opts.direction === 'prev' ? '-100%' : '100%'} : {},
                        y: action === 'hide' ? '0%' : opts.direction === 'prev' ? '100%' : '-100%',
                        onComplete: resolve
                    });
                }
                else {
                    this.DOM.revealer.style.transform = action === 'hide' ? 
                        'translate3d(0,0,0)' :
                        `translate3d(0,${opts.direction === 'prev' ? '100%' : '-100%'},0)`

                    resolve();
                }
            });
        }
        hide(direction, delay) {
            return this.toggle('hide', direction, delay);
        }
        show(direction, delay) {
            return this.toggle('show', direction, delay);
        }
        toggle(action, direction, delay) {
            this.zoom({
                scale: action === 'hide' ? 1.2 : 1.1, 
                speed: action === 'hide' ? this.config.revealer.speed[action] : this.config.revealer.speed[action]*2.5,
                ease: this.config.revealer.ease[action],
                startAt: action === 'show' ? {scale: 1} : {},
                delay: delay
            });
            if ( action === 'hide' ) {
                this.hideTexts(direction, delay);
            }
            else {
                this.showTexts(direction, delay);
            }
            return this[action === 'hide' ? 'showRevealer' : 'hideRevealer']({delay: delay, direction: direction, animation: true});
        }
        hideTexts(direction, delay) {
            this.toggleTexts('hide',direction, delay);
        }
        showTexts(direction, delay) {
            this.toggleTexts('show',direction, delay);
        }
        toggleTexts(action, direction, delay) {
            if ( this.isPositionedCenter() ) {
                this.DOM.titleBox.style.transformOrigin = this.DOM.subtitleBox.style.transformOrigin = action === 'hide' ? '100% 50%' : '0% 50%';

                const speed = action === 'hide' ? 0.2 : 0.6;
                const ease = action === 'hide' ? 'Power3.easeInOut' : 'Expo.easeOut';

                TweenMax.to(this.DOM.titleInner, speed, {
                    ease: ease,
                    delay: action === 'hide' ? delay : delay + 0.2,
                    startAt: action === 'show' ? {x: '-100%'} : {},
                    x: action === 'hide' ? '100%' : '0%',
                    opacity: action === 'hide' ? 0 : 1
                });

                TweenMax.to(this.DOM.titleBox, speed, {
                    ease: ease,
                    delay: action === 'hide' ? delay + 0.2 : delay,
                    startAt: action === 'show' ? {scaleX: 0} : {},
                    scaleX: action === 'hide' ? 0 : 1,
                    opacity: 1
                });

                TweenMax.to(this.DOM.subtitleInner, speed, {
                    ease: ease,
                    delay: action === 'hide' ? delay + 0.3 : delay + 0.5,
                    startAt: action === 'show' ? {x: '-100%'} : {},
                    x: action === 'hide' ? '100%' : '0%',
                    opacity: action === 'hide' ? 0 : 1
                });

                TweenMax.to(this.DOM.subtitleBox, speed, {
                    ease: ease,
                    delay: action === 'hide' ? delay + 0.5 : delay + 0.3,
                    startAt: action === 'show' ? {scaleX: 0} : {},
                    scaleX: action === 'hide' ? 0 : 1,
                    opacity: 1
                });

                TweenMax.to(this.DOM.explore, speed, {
                    ease: ease,
                    delay: delay + 0.2,
                    startAt: action === 'show' ? {y: '100%'} : {},
                    y: action === 'hide' ? '-100%' : '0%',
                    opacity: action === 'hide' ? 0 : 1
                });
            }
            else {
                TweenMax.to(this.DOM.titleInner, this.config.revealer.speed.hide, {
                    ease: 'Quint.easeOut',
                    delay: delay,
                    startAt:  action === 'show' ? {x: direction === 'next' ? '-50%' : '50%', opacity: 0} : {},
                    x:  action === 'show' ? '0%' : direction === 'next' ? '50%' : '-50%',
                    opacity: action === 'hide' ? 0 : 1
                });
            }
        }
        load() {
            this.zoom({
                scale: 1.1, 
                speed: this.config.revealer.speed['show']*2.5,
                ease: this.config.revealer.ease.hide
            });
            if ( this.isPositionedCenter() ) {
                TweenMax.to(this.DOM.explore, this.config.revealer.speed['show']*2.5, {
                    ease: this.config.revealer.ease.hide,
                    startAt: {y: '100%', opacity: 0},
                    y: '0%',
                    opacity: 1
                });
            }
        }
        zoom(opts = {}) {
            TweenMax.to(this.DOM.img, opts.speed || 1, {
                startAt: opts.startAt || {},
                delay: opts.delay || 0,
                scale: opts.scale || 1,
                ease: opts.ease || 'Quint.easeOut'
            });
        }
        reset() {
            this.isRight = this.isLeft = this.isCurrent = false;
            this.DOM.el.classList = 'coSlide';
        }
    }

    class coSlideshow {
        constructor(el) {
            this.DOM = {el: el};
            this.slides = [];
            Array.from(this.DOM.el.querySelectorAll('.coSlide')).forEach(slideEl => this.slides.push(new Slide(slideEl)));
            this.slidesTotal = this.slides.length;
            if ( this.slidesTotal < 3 ) {
                return false;
            }
            this.current = 0;
            this.render(false);
            this.initEvents();
        }
        render(hideSlidesBefore = false) {
            this.currentSlide = this.slides[this.current];
            this.nextSlide = this.slides[this.current+1 <= this.slidesTotal-1 ? this.current+1 : 0];
            this.prevSlide = this.slides[this.current-1 >= 0 ? this.current-1 : this.slidesTotal-1];
            this.currentSlide.setCurrent(hideSlidesBefore);
            this.nextSlide.setRight(hideSlidesBefore);
            this.prevSlide.setLeft(hideSlidesBefore);
        }
        load() {
            [this.nextSlide,this.currentSlide,this.prevSlide].forEach(slide => slide.load());
        }
        initEvents() {
            this.navigateFn = (slide) => {
                if ( slide.isPositionedRight() ) {
                    this.navigate('next');
                }
                else if ( slide.isPositionedLeft() ) {
                    this.navigate('prev');
                }
            };
            for (let slide of this.slides) {
                slide.DOM.imgWrap.addEventListener('click', () => this.navigateFn(slide));
            }
        }
        hideSlides(direction) {
            return this.toggleSlides('hide', direction);
        }
        updateSlides() {
            [this.nextSlide,this.currentSlide,this.prevSlide].forEach(slide => slide.reset());
            this.render(true);
        }
        showSlides(direction) {
            return this.toggleSlides('show', direction);
        }
        toggleSlides(action, direction) {
            const delayFactor = 0.2;
            let processing = [];
            
            [this.nextSlide,this.currentSlide,this.prevSlide].forEach(slide => {
                let delay = slide.isPositionedCenter() ? delayFactor/2 :
                            direction === 'next' ? slide.isPositionedRight() ? 0 : delayFactor :
                            slide.isPositionedRight() ? delayFactor : 0;

                processing.push(slide[action](direction, delay));
            });
            
            return Promise.all(processing);
        }
        navigate(direction) {
            if ( this.isAnimating ) return;
            this.isAnimating = true;

            this.current = direction === 'next' ? 
                    this.current < this.slidesTotal-1? this.current+1 : 0 :
                    this.current = this.current > 0 ? this.current-1 : this.slidesTotal-1;
            this.hideSlides(direction)
                .then(() => this.updateSlides())
                .then(() => this.showSlides(direction))
                .then(() => this.isAnimating = false);
        }
    }

    const slideshow = new coSlideshow(document.querySelector('.coSlideshow'));

    const loader = document.querySelector('.loader');
    imagesLoaded(document.querySelectorAll('.slideImg'), () => {
        setTimeout(() => {
            TweenMax.to(loader, 1, {
                ease: 'Quint.easeOut',
                y: '-100%'
            });
            slideshow.load();
        }, 400);
    });
}
