/**
 * Created by Richard on 17/01/2016.
 */


var svgIcons = $('.svgIcon');

var menuItems = $('.menu-item a');

var syn = $('#syn');

var logoBlocks = $('.block');
var greenBlocks = $('.greenBlock');
var topContainer = $('.topContainer');
var logo = $('#Logo');
var titleScroll;
var titleWidth;

var colours = [
    "#282828",
    "#00ac5f",
    "#f10e44"
];

var mainColour = colours[3];
var notMainColour = colours[3];

//Fancy logo animation
var logoTL = new TimelineMax({paused:true});
logoTL.set(logoBlocks,{visibility:"visible"});
logoTL.staggerFrom(logoBlocks,0.08,{scale:"0"},0.04);


//icons go red if hovered over.
svgIcons.hover(function() {
    linkHover(event,true);
});
//icons return to green when hover is gone.
svgIcons.mouseleave(function() {
    linkLeave(event,true);
});

//exact as above, only with menu
menuItems.hover(function() {
    linkHover(event,false);
});
//exact as above, only with menu
menuItems.mouseleave(function() {
    linkLeave(event,false);
});

//changes things for the above accordingly
function linkHover(event,child) {
    var tempID = "#".concat(event.target.id);
    if(child) {
        $(tempID).children().each(function () {
            TweenMax.to(this,0.2,{fill:colours[2]});
        });
    } else {
        TweenMax.to(event.target,0.2,{color:colours[2]});
    }
}
function linkLeave(event,child) {
    var tempID = "#".concat(event.target.id);
    if (child) {
        $(tempID).children().each(function () {
            TweenMax.to(this,0.2,{fill:mainColour});
        });
    } else {
        TweenMax.to(event.target,0.2,{color:mainColour});
    }
}

logo.hover(function() {
    TweenMax.to([greenBlocks,syn],0.2,{fill:colours[2]});
});

logo.mouseleave(function() {
    TweenMax.to([greenBlocks,syn],0.2,{fill:colours[1]});
});


//NOTE, in order to account for people entering the page NOT at the top, the specific function is called here.
function onLoad() {
    var scroll = $(window).scrollTop();
    if($(window).width() > 600) {
        if(scroll > 0) {
            mainColour = colours[1];
            notMainColour = colours[0];
            TweenMax.set(logo,{attr:{width:"100px",height:"100px"},left:"8.333%",top:"50px",marginTop:"-50px",marginLeft:"-50px"},0);
            TweenMax.set(topContainer,{minHeight:"100px"});
            goingDown();

            titleScroll = true;
        } else {
            mainColour = colours[0];
            notMainColour = colours[1];
            TweenMax.set(topContainer,{backgroundColor:notMainColour});
            TweenMax.set(menuItems,{color:mainColour});
            comingUp();

            for(var j=0;j<svgIcons.length;j++) {
                var tempID2 = "#".concat(svgIcons[j].id);
                $(tempID2).children().each(function () {
                    TweenMax.set(this,{fill:mainColour});
                });
            }
            titleScroll = false;
        }
        titleWidth = true;
    } else {
        mainColour = colours[1];
        notMainColour = colours[0];
        setLogo(true);
        TweenMax.set(topContainer,{minHeight:"100px"});
        titleScroll = scroll > 0;
        titleWidth = false;
    }
    logoTL.play(0);
}
//START!
onLoad();


//the following functions do NOT use a timeline, because they have variables that constantly change within the tweens (see the colour variables)
//this brings the logo up aka person has scrolled down from top of page
function goingDown() {
    TweenMax.to(topContainer,0.8,{minHeight:"100px",backgroundColor:notMainColour});
    TweenMax.to(logo,0.8,{attr:{width:"100px",height:"100px"},left:"8.333%",top:"50px",marginTop:"-50px",marginLeft:"-50px", ease:Power3.easeInOut});
    TweenMax.to(menuItems,0.8,{color:mainColour});
    for(var j=0;j<svgIcons.length;j++) {
        var tempID2 = "#".concat(svgIcons[j].id);
        $(tempID2).children().each(function () {
            TweenMax.to(this,0.8,{fill:mainColour});
        });
    }
}

//this brings the logo down aka person has reached the top of the page
function comingUp() {
    TweenMax.to(topContainer,0.8,{minHeight:"10px",backgroundColor:notMainColour});
    TweenMax.to(logo,0.8,{attr:{width:"300px",height:"300px"},left:"50%",top:"215px",marginTop:"-150px",marginLeft:"-150px", ease:Power3.easeInOut},0);
    TweenMax.to(menuItems,0.8,{color:mainColour},0);
    for(var i=0;i<svgIcons.length;i++) {
        var tempID = "#".concat(svgIcons[i].id);
        $(tempID).children().each(function () {
            TweenMax.to(this,0.8,{fill:mainColour},0);
        });
    }
}

//used with the resize function below
function setLogo(check) {
    if(check) {
        TweenMax.to(topContainer,0.4,{minHeight:"100px",backgroundColor:colours[0]});
        TweenMax.to(logo,0.4,{attr:{width:"50px",height:"50px"},left:"50%",top:"0",marginTop:"0",marginLeft:"-25px"});
        TweenMax.to(menuItems,0.4,{color:colours[1]},0);
        for(var i=0;i<svgIcons.length;i++) {
            var tempID = "#".concat(svgIcons[i].id);
            $(tempID).children().each(function () {
                TweenMax.to(this,0.8,{fill:colours[1]},0);
            });
        }
        if(mainColour == colours[0]) {
            mainColour = colours[1];
            notMainColour = colours[0];
        }
    } else {
        titleScroll = !titleScroll;
        scrollCheck();
    }

}

//does the scrolly business!
function scrollCheck() {
    var scroll = $(window).scrollTop();
    if(scroll > 0 && !titleScroll) {
        if($(window).width() > 600) {
            mainColour = colours[1];
            notMainColour = colours[0];
            goingDown();
        }
        titleScroll = true;
    } else if(scroll == 0 && titleScroll) {
        if($(window).width() > 600) {
            mainColour = colours[0];
            notMainColour = colours[1];
            comingUp();
        }
        titleScroll = false;
    }
}

//triggers whenever the user scrolls.
$(window).scroll(function () {
    scrollCheck();
});

//triggers when the window size changes, used for responsive structure
$(window).resize(function() {
    if($(window).width() > 600) {
        if(!titleWidth) {
            setLogo(titleWidth);
            titleWidth = true;
        }
    } else {
        if(titleWidth) {
            setLogo(titleWidth);
            titleWidth = false;
        }
    }
});