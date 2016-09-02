$(document).ready(function () {
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^=#])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body',
        transition: function (url) { window.location.href = url; }
    });

    $('.select_box').click(function (e) {
        $('.indicator').not(this).removeClass('rotate');
        $(this).stop(true, true).toggleClass("rotate");
    });

    $("#video_slider").owlCarousel({

        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 1,
        dots: true,
        loop: true,
        autoplay: true,
        singleItem: true

        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });

    $("#testimonial_slider").owlCarousel({

        navigation: true, // Show next and prev buttons
        slideSpeed: 200,
        paginationSpeed: 800,
        items: 1,
        dots: true,
        loop: true,
        autoplay: true,
        singleItem: true

        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });


    // js for bootstrap switches
    $('.BSswitch').bootstrapSwitch('state', true);


    $('#CheckBoxValue').text($("#TheCheckBox").bootstrapSwitch('state'));

    $('#TheCheckBox').on('switchChange.bootstrapSwitch', function () {

        $("#CheckBoxValue").text($('#TheCheckBox').bootstrapSwitch('state'));
    });

    $('.probeProbe').bootstrapSwitch('state', true);

    $('.probeProbe').on('switchChange.bootstrapSwitch', function (event, state) {

        alert(this);
        alert(event);
        alert(state);
    });

    $('#toggleSwitches ').click(function () {
        $('.BSswitch ').bootstrapSwitch('toggleDisabled');
        if ($('.BSswitch ').attr('disabled')) {
            $(this).text('Enable All Switches ');
        } else {
            $(this).text('Disable All Switches ');
        }
    });
    // js for switches end

    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".indicator")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('#accordion').on('hidden.bs.collapse', toggleIcon);
    $('#accordion').on('shown.bs.collapse', toggleIcon);

});

// 

$(document).ready(function () {

    $("#home_video").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds
        navigation: true,
        items: 4,
        dots: true,
        loop: true,
        autoplay: true,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
       navigationText: [
      "<i class='icon-chevron-left icon-white'></i>",
      "<i class='icon-chevron-right icon-white'></i>"
      ]
    });

    
	

});

function ajaxindicatorstart()
{
    if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
    jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="'+base_url()+'assets/img/ajax-loader.gif"><div>Loading...</div></div><div class="bg"></div></div>');
    }
    
    jQuery('#resultLoading').css({
        'width':'100%',
        'height':'100%',
        'position':'fixed',
        'z-index':'10000000',
        'top':'0',
        'left':'0',
        'right':'0',
        'bottom':'0',
        'margin':'auto'
    }); 
    
    jQuery('#resultLoading .bg').css({
        'background':'#000000',
        'opacity':'0.7',
        'width':'100%',
        'height':'100%',
        'position':'absolute',
        'top':'0'
    });
    
    jQuery('#resultLoading>div:first').css({
        'width': '250px',
        'height':'75px',
        'text-align': 'center',
        'position': 'fixed',
        'top':'0',
        'left':'0',
        'right':'0',
        'bottom':'0',
        'margin':'auto',
        'font-size':'16px',
        'z-index':'10',
        'color':'#ffffff'
        
    });

    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}

function readURL(input,ext,size){
  var file_name = input.value;
  var split_extension = file_name.split(".").pop();
  var extArr = ext.split("|");
  if($.inArray(split_extension.toLowerCase(), extArr ) == -1)
  {
    $(input).val("");
    alert('You Can Upload Only .'+extArr.join(", ")+' files !');
    return false;
  }
  if(size != ""){
    
  }
}

function cancelAction(){
  window.history.back();
}

function showToaster(type,text){
    swal({
      title: (type == "error") ? "Error !" : "Success",
      text : text,
      timer: 20000
    });
}



