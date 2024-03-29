var Application = {
	
	images_dir: 		"images/",
	placeholder_id: 	"player",
    timeline_id:         "timeline",
	video_interval: 	null, 
	img:  				null, 
	frame_rate: 		400,  // in miliseconds  
	images_list:   		[],
	frame_count:  		0,
	total_frames: 		0, 

	init: function() {
		var player = $("#" + Application.placeholder_id);
		
        this.img = $("#frame");
		
        // encodes json from serverside
		Application.getImagesList =  eval('(' + $("#images_list").html() + ')'); 

		// builds the array also fills sidebar
        Application.buildIndex();
		
        // since one picture represents a frame, total frame equals total pictures
        Application.total_frames = $(Application.images_list).size();
		
        // start playing 
        Application.video_interval = setInterval(Application.nextFrame, Application.frame_rate);
	
        // recursion
        //Application.nextFrame();
    },
	
	buildIndex: function() {
		// draw link on timeline
        var timeline = $("#" + Application.timeline_id);
        var menu = $.UL({});

        timeline.append(menu);

        $.each(Application.getImagesList, function(i, item) {
		    if (item != ".DS_Store")
		    {            
	            Application.images_list.push(item);
                
                $(menu).append(
                    $.A({ className: "frame" + i, href: "javascript:Application.goToFrame("+i+");" }, $.LI({}, item)));
            }
        });
	
        // resize url to fit all links in one row
        timeline.find("ul").css("width", (90 + 24) * Application.images_list.length);
    },
	
    goToFrame: function(frame) {
        Application.pause();
        Application.frame_count = frame;
        Application.nextFrame();
    },

    pause: function() {
        clearInterval(Application.video_interval);
    },

    resume: function() {
        Application.video_interval = setInterval(Application.nextFrame, Application.frame_rate);
    },

    start: function() {
        Application.frame_count = 0;

        clearInterval(Application.video_interval);
        Application.video_interval = setInterval(Application.nextFrame, Application.frame_rate);
    },
    
	nextFrame: function() {

        // if reached total, stop interval
        if (Application.frame_count >= Application.total_frames)                
        {
            clearInterval(Application.video_interval);
            return;
        }

		var nextFrameImage = Application.images_dir + Application.images_list[Application.frame_count];
        var currentImage = Application.img.find("img");

        //nextFrameImage = encodeURIComponent(nextFrameImage);

        //console.debug(nextFrameImage);

        Application.img.css("background-image", "url('" + nextFrameImage + "')");
        
        $("#frame img").animate({
            opacity: 0
        }, Application.frame_rate/2, function() {

            currentImage.remove();
            Application.img.append($.IMG({ src: nextFrameImage }));
            
        });
   
        // update active link on sidebar
        $("#timeline li").removeClass("active");
        $("#timeline .frame" + Application.frame_count).focus()
            .find("li").addClass("active");

		Application.frame_count++;
	}
	
};

$(document).ready(function() {
	Application.init();
});