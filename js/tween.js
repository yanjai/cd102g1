console.log("index");

TweenMax.fromTo('.box_1',1,{x:0,y:0},{x:100,y:300});
TweenMax.fromTo(['.box_1','.box_2'],2,{x:0},{x:600});
TweenMax.fromTo(['.box_1','.box_2'],2,{x:0},{x:600});
TweenMax.fromTo('.box_3',1,{ y:0,ease: Bounce.easeOut,scale:1.1},{y: 100});
TweenMax.fromTo('.box_4',1,{ x:0},{x:400,delay:1,repeatDelay:1,repeat:-1,yoyo:true});
TweenMax.fromTo('.box_5',1,{x:0},{X:700,rotationZ:360,rotationX:360,transfromOrigin:'left top'});

TweenMax.fromTo('.box_6', 4, {
    x: 0
}, {
    bezier: {
        // curviness: 1.25,
        values: [{
            x: 100,
            y: 200
        }, {
            x: 250,
            y: 400
        },{
            x: 500,
            y: 800
        },{
            x: 0,
            y: 0
        }],
        // autoRotate: true
    },
});

TweenMax.to('.box_7',1,{x:500,repeat:2});


//set
TweenMax.set('.box_set', {
    x:200
});


//換class
TweenMax.set('.box_class01', {
    // className: "box10"
    backgroundColor:'#aaa',
});

//增加class
TweenMax.set('.box_class02', {
    className: "+=box10"
});




// var _btn = $('.section02 .btn');\

// _btn.on('click',function(){
//        TweenMax.staggerFromTo('.section02 .box', 1, {
//         scale: 1.4,
//         alpha: 0
//     }, {
//         scale: 1,
//         alpha: 1,
//         ease: Elastic.easeOut
//     }, 0.2); 
// });



var _btn = $(".section2 .btn");

_btn.on('click',function(){
    TweenMax.staggerFromTo('.section2 .box', 1, {
        scale: 1.4,
        alpha: 0
    }, {
        scale: 1,
        alpha: 1,
        ease: Elastic.easeOut
    }, 0.2);
});



//連續動畫寫法:01先設一個變數，在寫語法
//var tl = new TimeLineMax();
//tl.to().to().to();







var tl = new TimelineMax({
    repeat: 2,
    repeatDelay: 1,
    yoyo: true,
    onComplete: action 
});

tl.to('.box_16', 1, {
    x: 100
},1).to('.box_17', 1, {
    y: 40
},0.5).to('.box_18', 1, {
    x: 20,
    y: 150
},2);



//TimelineMax


var tt = new TimelineMax({
  repeat : 2,
  repeatDelay:1
});

//

var tt = new TimelineMax();
tt.to('.box_19', 1, {
    x: 100
}).to('.box_20', 1, {
    y: 40
}).to('.box_21', 1, {
    x: 20,
    y: 150
});



//加入動畫
//先給一個變數，再加上add語法
//tl_01.add()
//TweenMax.to()

var tl_01 = new TimelineMax({
    repeat : 2,
    yoyo: true

  });

tl_01.add(TweenMax.to('.box_22' ,1,{x:100}));
tl_01.add(TweenMax.to('.box_23',1,{x: 450}));




function action(){
    var tl_001 = new TimelineMax({
        repeat: 2,
        yoyo: true
    });

    var tween01 = TweenMax.to('.box_24', 1, {
        x: 100
    });
    var tween02 = TweenMax.to('.box_25', 1, {
        x: 200
    });
    tl_001.add(tween01);
    tl_001.add(tween02);
}



var scene = document.getElementById('parallax_box');
//把滾動視差加入場景
var parallax = new Parallax(scene);


$(function () {

    var tls = new TimelineMax();
    var controller = new ScrollMagic.Controller();


    var tween_s = tls.to('.section05 .title', 1, {
        y: 30,
        alpha: 1
    }).to('.section05 .slogan', 1, {
        y: 40,
        alpha: 1
    });

    var scence_01 = new ScrollMagic.Scene({
            triggerElement: "#trigger",
            offset: 180
        }).setTween(tween_s)
        .addIndicators()
        .addTo(controller)





    //第二個場景

    var scence_02 = new ScrollMagic.Scene({
    triggerElement: "#trigger_02",
    offset: 0,
    duration: '100%',
    })
    .setClassToggle('.section06 .bg_all', 'bgc')
    .addIndicators()
    .addTo(controller) 
    

    //第三個場景
    var scence_03 = new ScrollMagic.Scene({
    triggerElement: "#trigger_03",
    offset: 200,
    duration: '100%',
    reverse: true
    })
    .on("enter" ,function(){
        document.getElementById('bgvid').play(); 
    })
    .on("leave" ,function(){
        document.getElementById('bgvid').pause();
    })
    //改觸發位置名稱(addIndicators)，也可以CLOSE
    // .addIndicators({
    //    name: 'video' 
    // })
    .addTo(controller) 






     



    console.log("scrollmagic")


})
