<script src="{{ asset('js/vendors.min.js') }}" type="text/javascript"></script>
<!--script src="{{asset('js/jquery/jquery.min.js')}}" type="text/javascript"></script--><!--------------vartical table text add js 29.7.2019------------>
<script src="{{ asset('js/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app1.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pace.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

<!-- Dtatable JS-->
<!-- <script type="text/javascript" src="{{ asset('js/jquery.aCollapTable.js') }}"></script> -->
<script src="{{ asset('js/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dataTables.treeGrid.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datatable-basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/form-select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plotly.js') }}"></script>
<!--script src="{{ asset('js/sweetalert.min.js') }}"></script-->
<script src="{{ asset('js/parsley.min.js') }}"></script>

  

		


	<script>
		$(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip({
    	
    	 trigger : 'hover'
    });
});
</script> 
<script>
/*
 * LetterAvatar
 * 
 * Artur Heinze
 * Create Letter avatar based on Initials
 * based on https://gist.github.com/leecrossley/6027780
 */
(function(w, d) {


    function LetterAvatar(name, size) {

        name = name || '';
        size = size || 60;

        var colours = [
                "#f30000", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad",
                "#2c3e50",
                "#f1c40f", "#e67e22", "#e74c3c", "#BDC3C7", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7",
                "#7f8c8d"
            ],

            nameSplit = String(name).toUpperCase().split(' '),
            initials, charIndex, colourIndex, canvas, context, dataURI;


        if (nameSplit.length == 1) {
            initials = nameSplit[0] ? nameSplit[0].charAt(0) : '?';
        } else {
            initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
        }

        if (w.devicePixelRatio) {
            size = (size * w.devicePixelRatio);
        }

        charIndex = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
        colourIndex = charIndex % 20;
        canvas = d.createElement('canvas');
        canvas.width = size;
        canvas.height = size;
        context = canvas.getContext("2d");

        context.fillStyle = colours[colourIndex - 1];
        context.fillRect(0, 0, canvas.width, canvas.height);
        context.font = Math.round(canvas.width / 2) + "px Arial";
        context.textAlign = "center";
        context.fillStyle = "#FFF";
        context.fillText(initials, size / 2, size / 1.5);

        dataURI = canvas.toDataURL();
        canvas = null;

        return dataURI;
    }

    LetterAvatar.transform = function() {

        Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
            name = img.getAttribute('avatar');
            img.src = LetterAvatar(name, img.getAttribute('width'));
            img.removeAttribute('avatar');
            img.setAttribute('alt', name);
        });
    };


    // AMD support
    if (typeof define === 'function' && define.amd) {

        define(function() {
            return LetterAvatar;
        });

        // CommonJS and Node.js module support.
    } else if (typeof exports !== 'undefined') {

        // Support Node.js specific `module.exports` (which can be a function)
        if (typeof module != 'undefined' && module.exports) {
            exports = module.exports = LetterAvatar;
        }

        // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
        exports.LetterAvatar = LetterAvatar;

    } else {

        window.LetterAvatar = LetterAvatar;

        d.addEventListener('DOMContentLoaded', function(event) {
            LetterAvatar.transform();
        });
    }

})(window, document);
</script>
<script>
	$(document).ready(function() {
        $("#teams").attr("disabled", true);
		var Role = {
			roles: "{{@$data['Role']}}"
		};
		if (Role.roles == 0) {
			//alert(Role.roles);
			$("#teams").attr("disabled", true);
		}else if (Role.roles == 2) {
			//alert(Role.roles);
           $("#teams option[value='']").attr('selected', true)	;
           $("#teams").attr("disabled", true);
		}else if(Role.roles == 3){
            $("#teams option[value='']").attr('selected', true)	;
			$("#teams").attr("disabled", true);
		}
		else
		{
            //$("#teams").prop("selectedIndex", 1);
            //$("#teams option[value='selected']").attr('selected', true)	;
           $("#teams").attr("disabled", false);
		}
	});

    /*onclick team function */
	
	
	</script>