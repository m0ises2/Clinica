$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$(document).ready(function() {
            $("#eambundle_empleado_nombreUsuario").change(function (e){
                
                var user = $(this).val();
                
                if( user != "" )
                {
                    $.post('ajax_', {'user':user}, function(data){                  
                                                        
                        if( data.responseCode != 200 ) //No disponible el usuario
                        {
                            $("#result").html('<i class="fa fa-times"></i>');
                            $("#eambundle_empleado_Guardar").removeClass("btn btn-outline btn-primary").addClass("btn btn-primary disabled");
                            $("#eambundle_empleado_Guardar_otro").removeClass("btn btn-outline btn-success").addClass("btn btn-success disabled");
                        }
                        else //Disponible el usuario
                        {
                            $("#result").html('<i class="fa fa-check"></i>');
                            $("#eambundle_empleado_Guardar").removeClass("btn btn-primary disabled").addClass("btn btn-outline btn-primary");
                            $("#eambundle_empleado_Guardar_otro").removeClass("btn btn-success disabled").addClass("btn btn-outline btn-success");
                        }                   
                    });
                }else
                {
                    $("#result").empty();
                }
            });

        });
