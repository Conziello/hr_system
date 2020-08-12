// Convert numbers to words
// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
// permission to use this Javascript on your web page is granted
// provided that all of the code (including this copyright notice) is
// used exactly as shown (you can change the numbering system if you wish)

// American Numbering System
var th = ['','thousand','million', 'billion','trillion'];
// uncomment this line for English Number System
// var th = ['','thousand','million', 'milliard','billion'];

var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

// Convert figures to money values
Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 }; 

function hidefull(){
	$('#fullsc').fadeOut(0);
	document.documentElement.mozRequestFullScreen();	
	dashboard();
}
function newemp(){
	$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function hidediv(){
$('#mon').hide();
$('#alertDiv, #modalDiv').remove();
}
function hidediv2(){
$('#empadd').hide();
}
function hidenewstude(){
$('#newstude').hide();
$('#mon').hide();
$('#alertDiv, #modalDiv, #headclose').remove();
}
function showcontract(){
	$('#contract').show();
}
function showphoto(param){
	$("#picreview").html('<img id="img-spinner" src="images/load.gif" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:8,param:param},
	success:function(data){
	$('#picreview').html(data);
	}
	});
}
function updatephoto(param){
	var name=$('#fname').val();
	var desc=$('#filedesc').val();
	var dou=$('#datepicker').val();
	$("#uphoto").html('<img id="img-spinner" src="images/load.gif" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:2,param:param,name:name,desc:desc,dou:dou},
	success:function(data){
	$('#uphoto').html(data);
	}
	});
}

function deletephoto(param){
	$("#uphoto").html('<img id="img-spinner" src="images/load.gif" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:3,param:param},
	success:function(data){
	$('#uphoto').html(data);
	}
	});
}
function hidecontract(){
	$('#from').val('');$('#to').val('');
	$('#contract').hide();
}
(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var input,
					self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "",
					wrapper = this.wrapper = $( "<span>" )
						.addClass( "ui-combobox" )
						.insertAfter( select );

				input = $( "<input>" )
					.appendTo( wrapper )
					.val( value )
					.addClass( "ui-state-combo ui-combobox-input" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
							select.trigger
							("change");
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									this._trigger("change",event,{item:null});
									return false;
								}
							}
						}
					})
				
				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.appendTo( wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( " ui-combobox-toggle" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// work around a bug (likely same cause as #5265)
						$( this ).blur();

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},

			destroy: function() {
				this.wrapper.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );

	$(function() {
		$( "#combobox" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
function dismisslan(param){
	
	$("#lantag" + param).hide();
	$.ajax({
	url:'bridge.php',
	data:{id:3,param:param,cat:'lan'},
	});
}
function dismissbach(param){
	$("#edutag" + param).hide();
	$.ajax({
	url:'bridge.php',
	data:{id:3,param:param,cat:'edu'},
	});
}
function dismissskl(param){
	
	$("#skilltag" + param).hide();
	$.ajax({
	url:'bridge.php',
	data:{id:3,param:param,cat:'skl'},
	});
}
function dismisshobby(param){
	
	$("#hobbytag" + param).hide();
	$.ajax({
	url:'bridge.php',
	data:{id:3,param:param,cat:'hobby'},
	});
}	
function dismissexp(param){
	$("#exptag" + param).hide();
	$.ajax({
	url:'bridge.php',
	data:{id:3,param:param,cat:'exp'},
	});
}	
$("#language" ).combobox().change(function(){
	var str =$('#language').val();
	var parts=str.split('θ',2)
	var k=parts[0];
	var param=parts[1];
	
	var prev=$("#languages").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"lantag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismisslan('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
	$('#languages').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,k:k,cat:'lan'},
	});
	
	$('#language').parent().find("input:first").val('').focus();
});
$("#experience" ).combobox().change(function(){
	var str =$('#experience').val();
	var parts=str.split('θ',2)
	var k=parts[0];
	var param=parts[1];
	
	var prev=$("#experiences").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"exptag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissexp('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
	$('#experiences').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,k:k,cat:'exp'},
	});
	
	$('#experience').parent().find("input:first").text('').focus();
});

$('#skill').on('keydown', function(ex) {
	if (!ex) ex = event;
	if (ex.keyCode==13){ 
	addskill();
	}
});

function addskill(){
	var param =$('#skill').val();
	var k=Math.floor((Math.random() * 50) + 1); 
	var prev=$("#skills").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"skilltag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissskl('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
	$('#skills').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,cat:'skl',k:k},
	});

	$('#skill').val('').focus();
	
	
}

$('#hobby').on('keydown', function(ex) {
	if (!ex) ex = event;
	if (ex.keyCode==13){ 
	addhobby();
	}
});

function addhobby(){
	var param =$('#hobby').val();
	var k=Math.floor((Math.random() * 50) + 1); 
	var prev=$("#hobbies").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"hobbytag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismisshobby('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
	$('#hobbies').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,cat:'hobby',k:k},
	});
	
	$('#hobby').val('').focus();
	
	
}

$("#town" ).combobox();
function showedu(a){
	for(i=0;i<5;i++){
	$('#option' + i).hide(); 
	}	
	$('#option' + a).show();
	}
$("#certificate" ).combobox().change(function(){
	var str =$('#certificate').val();
	var parts=str.split('θ',2)
	 var k=parts[0];
	 var param=parts[1];
	
	var tag = document.getElementById("tag"+ param);
	if (!tag) {
	var prev=$("#bachelors").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"edutag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissbach('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
	$('#bachelors').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,cat:'edu',k:k},
	});
	
	}
	
});

$("#diploma" ).combobox().change(function(){
	var str =$('#diploma').val();
	var parts=str.split('θ',2)
	 var k=parts[0];
	 var param=parts[1];
	
	var tag = document.getElementById("tag"+ param);
	if (!tag) {
	var prev=$("#bachelors").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"edutag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissbach('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
	$('#bachelors').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,cat:'edu',k:k},
	});
	
	}	
});

$("#degree" ).combobox().change(function(){
	var str =$('#degree').val();
	var parts=str.split('θ',2)
	 var k=parts[0];
	 var param=parts[1];
	
	var tag = document.getElementById("tag"+ param);
	if (!tag) {
	var prev=$("#bachelors").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"edutag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissbach('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
	$('#bachelors').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,cat:'edu',k:k},
	});
	
	}	
});
$(".combos" ).combobox();
$("#masters" ).combobox().change(function(){
	var str =$('#masters').val();
	var parts=str.split('θ',2)
	 var k=parts[0];
	 var param=parts[1];
	
	var tag = document.getElementById("tag"+ param);
	if (!tag) {
	var prev=$("#bachelors").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"edutag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissbach('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
	$('#bachelors').html(curr);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:param,cat:'edu',k:k},
	});
	
	}	
});

function validatenum(a){
	var numexp=/^[0-9]+$/;
	if($("#" + a).val().match(numexp)){
		$("#"+a).css({'border' : 'solid #75c5cf 1px'});
		return true;
	}else{
		$("#"+a).css({'border' : 'solid #f00 2px'});
		var str=$("#"+a).val();
		var b=str.length;
		b=b-1;
		var g=str.substr(0,b);
		$("#"+a).val(g);
		
	}
}

function validatealp(a){
	
	
	var numexp=/^[a-zA-Z ]+$/;
	if($("#" + a).val().match(numexp)){
		$("#"+a).css({'border' : 'solid #75c5cf 1px'});
		return true;
	}else{
		$("#"+a).css({'border' : 'solid #f00 2px'});
		var str=$("#"+a).val();
		var b=str.length;
		b=b-1;
		var g=str.substr(0,b);
		$("#"+a).val(g);
		
	}
}



function addnewemp(a){
	var emp=$('#emp').val();
	var biomid=$('#biomid').val();
	var fname=$('#fname').val();
	var mname=$('#mname').val();
	var lname=$('#lname').val();
	var dob=$('#dob').val();
	var mar=$('#mar').val();
	var gender = $('input[name=gender]:checked').val();
	var idno=$('#idno').val();
	var phone=$('#phone').val();
	var phone2=$('#phone2').val();
	var email=$('#emailadd').val();
	var phy=$('#phyadd').val();
	var town=$('#town').val();
	
	if(fname==''||lname==''||idno==''||phone==''||biomid==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields in the Personal Details Sub-Panel!</p>');
		return;
	}
	
	var sal=$('#sal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var doe=$('#datepicker2').val();
	var empcateg=$('#empcateg').val();
	var emptype = $('input[name=emptype]:checked').val();
	var dept=$('#dept').val();
	var pos=$('#pos').val();
	var jobdesc=$('#jobdesc').val();
	var contfrom=$('#from').val();
	var contto=$('#to').val();
	var branch=$('#branch').val();
	var clearance=$('#clearance').val();
	
	if(sal==''||doe==''||branch==''||emptype==''||dept==''||pos==''||(emptype=='Contract'&&(contfrom==''||contto==''))){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields in the Employment Details Sub-Panel!</p>');
		return;
	}
	
	
	
	var ename=$('#ename').val();
	var ephone=$('#ephone').val();
	var epostal=$('#epostal').val();
	var bgroup=$('#bgroup').val();
	var alergy=$('#alergy').val();
	/*
	if(ename==''||ephone==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields in the Emergency Contact Details Sub-Panel!</p>');
		return;
	}
	*/
	
	var str=$('#bank').val();
	var parts=str.split('#',2);
	var bid=parts[0];
    var bname=parts[1];
	
	if(!bname){bname='';}
	var acno=$('#acno').val();
	var branchname=$('#branchname').val();
	var eftcode=$('#eftcode').val();
	var pinno=$('#pinno').val();
	var nhif=$('#nhif').val();
	var nssf=$('#nssf').val();
	

	$("#newemployee").html('<img id="img-spinner" src="images/load.gif" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:1,a:a,emp:emp,biomid:biomid,fname:fname,mname:mname,lname:lname,dob:dob,mar:mar,gender:gender,idno:idno,phone:phone,phone2:phone2,email:email,phy:phy,town:town,sal:sal,empcateg:empcateg,doe:doe,emptype:emptype,pos:pos,dept:dept,jobdesc:jobdesc,contfrom:contfrom,contto:contto,ename:ename,ephone:ephone,epostal:epostal,bgroup:bgroup,alergy:alergy,bid:bid,bname:bname,branchname:branchname,eftcode:eftcode,acno:acno,pinno:pinno,nhif:nhif,nssf:nssf,branch:branch,clearance:clearance},
	success:function(data){
	$('#newemployee').html(data);
	
	}
	});
}

function seeemp(a){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:100,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function employeefile(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:102},
	success:function(data){
	$('#mainp').html(data);
	}
});
}
function empchart(param){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
			$.ajax({
				url:'bridge.php',
				data:{id:7,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
}
$("#emp1" ).combobox().change(function(){
	var param = $('#emp1').val();
	 var ser = $('#ser').val();
	 if(ser==10){
			$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to remove this record from the Database. <br/>This cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
			$.ajax({
				url:'bridge.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
		 
	 }
	 else{
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
			$.ajax({
				url:'bridge.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}

});

function findemp(){
	var param='default';
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:6,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function menuop(a){
	for(i=0;i<20;i++){
	$('#op' + i).hide(); 
	}	
	$('#op' + a).show();
	$('#emp2' + a).parent().find('input:first').focus();	
 }
 
$('input[name=empfield]').on('keydown', function(ex) {
	if (!ex) ex = event;
	if (ex.keyCode==13){ 
	var str =$('#menusearch').val();
	var parts=str.split('θ',2)
	var m=parts[0];
	var cat=parts[1];
	var param = $('#emp2' + m).val();
	paginateteach(2,param,1,cat);	
	
	}
});
 
$(".emp2" ).combobox().change(function(){
	var str =$('#menusearch').val();
	var parts=str.split('θ',2)
	var m=parts[0];
	var cat=parts[1];
	var param = $('#emp2' + m).val();
	paginateteach(2,param,1,cat);
});


function Display_Load()
{
$("#loading").fadeIn(900,0);
$("#display").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:55%; left:50%" alt="Loading"/>');
}
//Hide Loading Image
function Hide_Load()
{
$("#loading").fadeOut('slow');


}


function paginate(ser,param)
{	

$("#pagination li:first")
.css({'color' : '#FF0084'}).css({'border' : 'solid #999 1px'});
Display_Load();
var pageNum = 1;
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param, Hide_Load());

//Pagination Click
$("#pagination li").click(function(){
Display_Load();
//CSS Styles
$("#pagination li")
  .css({'border' : 'solid #999 1px'})
.css({'color' : '#0063DC'});

$(this)
.css({'color' : '#FF0084'})
.css({'border' : 'solid #999 1px'});
//Loading Data
var pageNum = this.id;
var tit=$('#title').html();
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param, Hide_Load());
});

}



function paginateteach(ser,param,page,cat){	
Display_Load();
$("#pagination li")
  .css({'border' : 'solid #999 1px'})
.css({'color' : '#0063DC'});
//Loading Data
var pageNum = page;
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param + '&' + "\ncat=" + cat, Hide_Load());
}


function pagerefresh(pageNum,ser,param){
Display_Load();
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param, Hide_Load());	
}

function exemp(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:20},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#emp3" ).combobox().change(function(){
		 var param = $('#emp3').val();
		paginateteach(4,param,1,'emp');
});
function dashboard(){
	$('#shortie').fadeOut(0);$('#shortvalue').val(0);
	$('#alertDiv, #modalDiv').remove();	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:11},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function showtasks(){
	var d1 = $('#datepicker3').val();
	if(d1==''){
	$().customAlert();
		alert('Error!', '<p>Pick a valid date!</p>');
		 $('#datepicker3').focus();
		return;
	}
	var g=d1.substr(0,2);
	var h=d1.substr(3,2);
	var i=d1.substr(6,4);
	var j=i+h+g;
	var x=i+ h + g;
	$("#display2").fadeOut(500);
	$.ajax({
	url:'bridge.php',
	data:{id:12,stamp:x},
	success:function(data){
	$('#display2').html(data);
	$("#display2").fadeIn(500);
	}
	});
}
function newtask(a){
	$("#newtask").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:13,a:a,param:0},
	success:function(data){
	$('#newtask').html(data);
	}
	});
}
function edittask(a,param){
	$("#newtask").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:13,a:a,param:param},
	success:function(data){
	$('#newtask').html(data);
	}
	});
}
function showrem(){
	var rem = $('input[name=remind]:checked').val();
	if(rem==1){
	$('#showrem').show();

	}
	else{
		$('#showrem').hide();
		
	}
	
}

function updatetask(a,b){
	var subject=$('#subject').val();
	var category=$('#category').val();
	var sdate=$('#datepicker4').val();
	var stime=$('#timer1').val();
	var status=$('#status').val();
	var priority=$('#priority').val();
	var remind = $('input[name=remind]:checked').val();
	if(remind!=1){remind=0;}
	var rdate=$('#datepicker5').val();
	var rtime=$('#timer2').val();
	var notes=$('#notes').val();
	
	if(subject==''||sdate==''||stime==''){
	$().customAlert();
		$("#taskstud").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Fill all the Required Fields!</div>');
		$('#datepicker4').focus();
		return;
	}
	if(remind==1&&(sdate==''||stime=='')){
	$().customAlert();
	$("#taskstud").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Fill the Remider details!</div>');
		$('#datepicker5').focus();
		return;
	}
	
	
	
	$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:4,a:a,b:b,subject:subject,category:category,sdate:sdate,stime:stime,status:status,priority:priority,remind:remind,rdate:rdate,rtime:rtime,notes:notes},
	success:function(data){
	$('#taskstud').html(data);
	}
	});
}

function terminate(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:14},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function discipline(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:14.1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function reinstate(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:14.2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$("#emp56" ).combobox().change(function(){
	var param = $('#emp56').val();
	 $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
			$.ajax({
				url:'data.php',
				data:{id:5.2,emp:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	

});

function termemp(){
	var emp=$('#emp55').val();
	var dot=$('#datepicker4').val();
	var reason=$('#reason').val();
	
	
	if(emp==''||dot==''||reason==''){
	$().customAlert();
		$("#taskstud").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Fill all the Required Fields!</div>');
		$('#emp5').focus();
		return;
	}
	
	
	$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:5,emp:emp,dot:dot,reason:reason},
	success:function(data){
	$('#taskstud').html(data);
	}
	});
}


function discemp(){
	var emp=$('#emp55').val();
	var measure=$('#measure').val();
	var reason=$('#reason').val();
	
	
	if(emp==''||measure==''||reason==''){
	$().customAlert();
		$("#taskstud").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Fill all the Required Fields!</div>');
		$('#emp5').focus();
		return;
	}
	
	
	$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:5.1,emp:emp,measure:measure,reason:reason},
	success:function(data){
	$('#taskstud').html(data);
	}
	});
}

function documents(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:15},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function loadpdf(a){
	
	$("#display").html('<object data="hrmdocs/' +a +'" type="application/pdf" width="100%" height="95%"></object>');

}
function reqleave(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:16},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function submleave(){
	var emp=$('#pfno').val();
	var from=$('#datepicker4').val();
	var to=$('#datepicker5').val();
	var shadow=$('#shadow').val();
	var reason=$('#reason').val();
	var leavetype=$('#leavetype').val();
	d7=from.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	d8=to.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	
	
	if(emp==''||from==''||to==''||shadow==''||reason==''||leavetype==''){
	$().customAlert();
		$("#taskstud").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Fill all the Required Fields!</div>');
		$('#pfno').focus();
		return;
	}
	
	var d1=from;
	var d2=to;
	var g=d1.substr(0,2);
	var h=d1.substr(3,2);
	var i=d1.substr(6,4);
	var j=i+h+g;
	var x=h+'/'+ g +'/'+ i;

	var g=d2.substr(0,2);
	var h=d2.substr(3,2);
	var i=d2.substr(6,4);
	var k=i+h+g;
	var y=h+'/'+ g +'/'+ i;
	
	
	 //mm/dd/yyyy
	 var d11=new Date("" + x + "");
	 var d22=new Date("" + y + "");
	 var  timeDiff=Math.abs(d22.getTime() - d11.getTime());
	 var diffDays=Math.ceil(timeDiff/(1000*3600*24));

	if(parseInt(k,10)<parseInt(j,10)){
	$().customAlert();
	alert('Error!', '<p>Enter some valid dates.</p>');
	$("#datepicker5").css({'border' : 'solid #f00 1px'});
	e.preventDefault();

	}else{
		$("#datepicker5").css({'border' : 'solid #75c5cf 1px'});
	}

	if(parseInt(d7,10)==parseInt(d8,10)){

		$.confirm({
			'title'		: 'Half Day Leave Confirmation',
			'message'	: 'We have noticed you applied for a same day leave. <br/>Click YES to apply for a half day leave and NO to apply for a full day leave.',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						var leavestat=0.5;
						diffDays=leavestat;
						$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
						$.ajax({
						url:'data.php',
						data:{id:6,emp:emp,from:from,to:to,shadow:shadow,days:diffDays,reason:reason,leavetype:leavetype,leavestat:leavestat},
						success:function(data){
						$('#taskstud').html(data);
						}
						});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){

						var leavestat=1;
						diffDays=leavestat;
						$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
						$.ajax({
						url:'data.php',
						data:{id:6,emp:emp,from:from,to:to,shadow:shadow,days:diffDays,reason:reason,leavetype:leavetype,leavestat:leavestat},
						success:function(data){
						$('#taskstud').html(data);
						}
						});
					}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});


	return;
	}

	
	
	$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:6,emp:emp,from:from,to:to,shadow:shadow,days:diffDays,reason:reason,leavetype:leavetype,leavestat:0},
	success:function(data){
	$('#taskstud').html(data);
	}
	});
}

function authleave(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:17},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function leaveauth(a){
	var action=$('#action'+a).val();
		$.confirm({
			'title'		: 'Leave Authorization',
			'message'	: action + ' Leave?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						$("#confirmButtons").remove();
						
			$.ajax({
				url:'data.php',
				data:{id:7,action:action,a:a},
				success:function(data){
				$("#leave"+a).remove();
				}
			});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){
						
						}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
}

function leavecal(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:44},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function alterleave(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:44.1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$("#emp57" ).combobox().change(function(){
	var str = $('#emp57').val();
	 var parts=str.split('θ',3);
	 $('#oleaveac').val(parts[1]);
	 $('#osickac').val(parts[2]);

});

function alterleavedays(){
	var str = $('#emp57').val();
	 var parts=str.split('θ',3);
	var emp=parts[0];
	var leaveac=$('#leaveac').val();
	var sickac=$('#sickac').val();
	if(emp==''||leaveac==''||sickac==''){
	$().customAlert();
		$("#taskstud").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Fill all the Required Fields!</div>');
		$('#emp57').focus();
		return;
	}
	
	
	$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:30,emp:emp,leaveac:leaveac,sickac:sickac},
	success:function(data){
	$('#taskstud').html(data);
	}
	});
}


function showleaves(){
	var d1 = $('#datepicker3').val();
	var d2 = $('#datepicker4').val();
	if(d1==''){
	$().customAlert();
		alert('Error!', '<p>Pick a valid date!</p>');
		 $('#datepicker4').focus();
		return;
	}
	var g=d1.substr(0,2);
	var h=d1.substr(3,2);
	var i=d1.substr(6,4);
	var j=i+h+g;
	var x=i+ h + g;
	
	var g=d2.substr(0,2);
	var h=d2.substr(3,2);
	var i=d2.substr(6,4);
	var j=i+h+g;
	var y=i+ h + g;
	
	$("#display").fadeOut(500);
	$.ajax({
	url:'bridge.php',
	data:{id:19,stamp1:x,stamp2:y},
	success:function(data){
	$('#display').html(data);
	$("#display").fadeIn(500);
	}
	});
}
function takeatt(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:20},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function checkatt(a){
	var d = new Date();
	var n = d.getMonth(); 
	n++;

	var n=n.toString();
	
	if(n.length==1){
	n=0+n;
	}

	var d = new Date();
	var m = d.getFullYear(); 
	var cur=n + '_' + m;
		
	var action=$('#action'+a).val();
	var d1=$('#datepicker3').val();
	
	var h=d1.substr(3,2);
	var i=d1.substr(6,4);
	var x=h + '_' + i;
	/*
	if(cur!=x){
	$().customAlert();
		alert('Error!', '<p>Cannot edit Attendance Logs for  Months other than the current Month!</p>');
		return;	
	}
	*/
	
	
	if(action==1){
	$("#back"+a).css({'background' : '#0f6'});
	}
	else if(action==2){
	$("#back"+a).css({'background' : '#0ff'});
	}
	else if(action==3){
	$("#back"+a).css({'background' : '#ff3'});
	}
	else if(action==4){
	$("#back"+a).css({'background' : '#ff4dff'});
	}

	else if(action==5){
	$("#back"+a).css({'background' : '#FF8C00'});
	}

	else{
	$("#back"+a).css({'background' : '#f00'});
	}
	$.ajax({
	url:'data.php',
	data:{id:8,action:action,a:a,tdate:d1},
	success:function(data){
	if(data=='0'){
		$("#back"+a).css({'background' : '#f00'});
		$('#action'+a).val(0);

	}
	
	}
	});
}


function showattendance(){
	var d1 = $('#datepicker3').val();
	if(d1==''){
	$().customAlert();
		alert('Error!', '<p>Pick a valid date!</p>');
		 $('#datepicker3').focus();
		return;
	}
	var g=d1.substr(0,2);
	var h=d1.substr(3,2);
	var i=d1.substr(6,4);
	var x=h + '_' + i;
	$("#display").fadeOut(500);
	$.ajax({
	url:'bridge.php',
	data:{id:21,mon:x,tdate:g,d1:d1},
	success:function(data){
	$('#display').html(data);
	$("#display").fadeIn(500);
	}
	});
}
function newpay(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:22},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function newpayroll(){
	var mon=$('#datepicker7').val()
	var branch=$('#branch1').val()
		if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else if(branch==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
			
			$.confirm({
			'title'		: 'Create Payroll Confirmation',
			'message'	: 'You are about to create a pay roll for this month. This cannot be reversed later. Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:9,mon:mon,branch:branch},
	success:function(data){
		$("#mainp").html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		}
}

function payroll(mon){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:23,mon:mon},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function editpay(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:24},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function editpayroll(){
	var mon=$('#mon1').val()
		if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		
		else{
		
			$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:23,mon:mon},
			success:function(data){
				$("#mainp").html(data);
			}
			});
	
					
		}
}

function savepayemp(emp,mon){	
	var sal=$('#sal' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var hallow=$('#hallow' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var cash=$('#cash' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var airtime=$('#airtime' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var car=$('#car' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var leave=$('#leave' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	var bonus=$('#bonus' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var thirteen=$('#thirteen' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var notice=$('#notice' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');


	var insamount=$('#insamount' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var hrs=$('#hrs' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var rate=$('#rate' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var adva=$('#adva' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var helb=$('#helb' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var pfund=$('#pfund' + emp).val();
	var sacco=$('#sacco' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var loans=$('#loans' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var medical=$('#medical' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var others=$('#others' + emp).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tax=$('#tax' + emp).val();

	$('#save' + emp).html('<img id="img-spinner" src="images/load.gif" style="position:relative; margin:5.5px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:10,emp:emp,sal:sal,hallow:hallow,cash:cash,airtime:airtime,car:car,leave:leave,insamount:insamount,adva:adva,helb:helb,pfund:pfund,othrs:hrs,rate:rate,mon:mon,sacco:sacco,loans:loans,tax:tax,others:others,bonus:bonus,thirteen:thirteen,notice:notice,medical:medical},
	success:function(data){
	$('#save' + emp).html(data);
	}
	});
}
function deletepayemp(ser){
$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this person from the Payroll. <br/>This cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#pay" + ser).remove();
	$.ajax({
	url:'data.php',
	data:{id:17,ser:ser},
	success:function(data){
	$("#pay" + ser).html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}
function addtopay(){
$('#empadd').show();
}
$("#emp4" ).combobox().change(function(){
		 var param = $('#emp4').val();
		 var mon = $('#curmon').val();
		 $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
		 $.ajax({
		url:'data.php',
		data:{id:11,emp:param,mon:mon},
		success:function(data){
		$('#mainp').html(data);
		}
		});
		
});

function commitpay(){
	var mon=$('#curmon').val();
	var branch=$('#curbranch').val();
	$.confirm({
			'title'		: 'Commit Confirmation',
			'message'	: 'You are about to commit this Payroll. <br/>You cannot edit this payroll at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){

	 $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:12,mon:mon,branch:branch},
	success:function(data){
	$('#mainp').html(data);
	
	}
	});
	
		}
			},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	
}

function paysett(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:25},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function leavesett(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:50},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveholiday(code){	
	var date=$('#date' + code).val();
	$('#save' + code).html('<img id="img-spinner" src="images/load.gif" style="position:relative; margin:5.5px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:31,code:code,date:date},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}


function savenhif(code){	
	var lower=$('#lower' + code).val();
	var upper=$('#upper' + code).val();
	var amount=$('#amount' + code).val();
	$('#save' + code).html('<img id="img-spinner" src="images/load.gif" style="position:relative; margin:5.5px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:13,code:code,upper:upper,lower:lower,amount:amount},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function savetax(code){	
	var lower=$('#taxlower' + code).val();
	var upper=$('#taxupper' + code).val();
	var amount=$('#taxpercent' + code).val();
	$('#taxsave' + code).html('<img id="img-spinner" src="images/load.gif" style="position:relative; margin:5.5px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:14,code:code,upper:upper,lower:lower,amount:amount},
	success:function(data){
	$('#taxsave' + code).html(data);
	}
	});
}
function submnssf(){	
	var employee=$('#employeenssf').val();
	if(employee==''){
		$().customAlert();
		alert('Error!', '<p>Enter the employee contributions.</p>');
		e.preventDefault();
		}
		else{
	$("#mes3").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:15,employee:employee},
	success:function(data){
	$('#mes3').html(data);
	}
	});
	}
}
function submover(){	
	var amount=$('#overtime').val();
	if(amount==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Rate per Hour.</p>');
		e.preventDefault();
		}
		else{
	$("#mes4").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:16,amount:amount},
	success:function(data){
	$('#mes4').html(data);
	}
	});
	}
}

function empben(){
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:26},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$("#emp5" ).combobox().change(function(){
		 var param = $('#emp5').val();
		 $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
		 $.ajax({
		url:'data.php',
		data:{id:18,emp:param},
		success:function(data){
		$('#mainp').html(data);
		}
		});
		
});

function previewpay(){
	 var mon = $('#curmon').val();
	  var branch = $('#curbranch').val();
	 if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
			window.open('output.php?id=4&reg='+ mon + '&' + "\nbranch=" + branch)
		}
}


function savebenemp(emp){	
	var phone=$('#phone' + emp).val();
	var health=$('#health' + emp).val();
	var vehicle=$('#vehicle' + emp).val();
	var house=$('#house' + emp).val();
	var entertainment=$('#entertainment' + emp).val();
	var perdiem=$('#perdiem' + emp).val();
	var others=$('#others' + emp).val();
	$('#save' + emp).html('<img id="img-spinner" src="images/load.gif" style="position:relative; margin:5.5px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:19,emp:emp,phone:phone,health:health,vehicle:vehicle,house:house,entertainment:entertainment,perdiem:perdiem,others:others},
	success:function(data){
	$('#save' + emp).html(data);
	}
	});
}

function checkmess(i,a){
	$.ajax({
	url:'data.php',
	data:{id:20,a:a},
	success:function(data){
	$('#lebo' + i).css({'font-weight' : 'normal'});
	$('#check' + i).hide();
	$('#messagelog').dialog( 'close' );
	}
	});
}

function sendmessage(a){
var to = $('#user1').val();
var mess = $('#mezzage').val();

		if(to==''||mess==''){
		return;
		}
	
	else{
		 $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:21,to:to,a:a,mess:mess},
		success:function(data){
		$('#mainp').html(data);
		}
		});	
		}	
}


function savenewholiday(){
var name = $('#holname').val();
var date = $('#holdate').val();

		if(name==''||date==''){
		$().customAlert();
		alert('Error!', '<p>Enter all the required fields!</p>');
		e.preventDefault();
		}
	
		else{
		$("#mes3").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:33,name:name,date:date},
		success:function(data){
		$('#mes3').html(data);
		}
		});	
		}	
}


function deleteholiday(ser){
$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this Holiday. <br/>This cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#delete" + ser).remove();
	$.ajax({
	url:'data.php',
	data:{id:34,code:ser},
	success:function(data){
	$("#delete" + ser).html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}

function logout(){	

	$.confirm({
			'title'		: 'Logout Confirmation',
			'message'	: 'You are about to Logout from the system. <br/>Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){

				window.location.href = "index.php"
	
		}
			},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}
	
function company(){
$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:27},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function editcompany(){
var cname = $('#cname').val();
var tel = $('#tel').val();
var add = $('#add').val();
var web = $('#web').val();
var email = $('#email').val();	
var motto = $('#motto').val();
var loc = $('#loc').val();

		if(cname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Company Name!</p>');
		e.preventDefault();
		}
		else if(tel==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Company Telephone No.!</p>');
		e.preventDefault();
		}
		else if(add==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Company Address!</p>');
		e.preventDefault();
		}
		else{
		
	$('#res2').html('<img id="img-spinner" src="images/load.gif" style="margin-top:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:22,cname:cname,tel:tel,add:add,add:add,web:web,email:email,motto:motto,loc:loc},
	success:function(data){
	$('#res2').html(data);
	}
	});
				
		}
}


function adduser(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:28},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addnewuser(){
var emp = $('#emp6').val();
var name=$('#emp6 option:selected').text();
var name1 = $('#name1').val();
var user = $('#name1').val() + $('#name2').val();
var pass = $('#pass1').val();
var email = $('#email1').val();
var pos = $('#pos1').val();
var dept = $('#dept1').val();
var bra = $('#branch1').val();

		if(name1==''){
		$().customAlert();
		alert('Error!', '<p>Enter the user initials!</p>');
		$('#name1').focus();
		}
		else if(emp==''){
		$().customAlert();
		alert('Error!', '<p>Select the employee name!</p>');
		$("#emp6").parent().find("input:first").focus();	
		}
		else if(pass==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Password!</p>');
		$('#pass1').focus();
		}
		else if(pos==''){
		$().customAlert();
		alert('Error!', '<p>Select the user position!</p>');
		$("#pos1").parent().find("input:first").focus();	
		}
		else if(bra==''){
		$().customAlert();
		alert('Error!', '<p>Select the department!</p>');
		$("#branch1").parent().find("input:first").focus();	
		}
		else if(dept==''){
		$().customAlert();
		alert('Error!', '<p>Select the department!</p>');
		$("#dept1").parent().find("input:first").focus();	
		}
		
	else{
		$('#res1').html('<img id="img-spinner" src="images/load.gif" style="margin-top:40px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:23,user:user,name:name,pos:pos,pass:pass,dept:dept,bra:bra,emp:emp,email:email},
		success:function(data){
		$('#res1').html(data);
		}
		});	
		}	
}


$("#acname3" ).combobox().change(function(){
	 var str = $('#acname3').val();
	 var parts=str.split('θ',6);
	 $('#dept2').val(parts[0]);
	 $('#pos2').val(parts[1]);
	 $('#branch2').val(parts[2]);
	 $('#fullname').val(parts[3]);
	 $('#stamper').val(parts[4]);
	  $('#email2').val(parts[5]);
	 
});
function edituser(){
var emp = $('#fullname').val();
var name=$('#fullname option:selected').text();
var pos = $('#pos2').val();
var dept = $('#dept2').val();
var email = $('#email2').val();
var bra = $('#branch2').val();
var auto = $('#stamper').val();
var rec = $('input[name=respas]:checked').val();
if(rec!=1){rec=0}

		if(emp==''){
		$().customAlert();
		alert('Error!', '<p>Select the employee name!</p>');
		$("#fullname").parent().find("input:first").focus();	
		}
		
		else if(pos==''){
		$().customAlert();
		alert('Error!', '<p>Select the user position!</p>');
		$("#pos1").parent().find("input:first").focus();	
		}
		else if(bra==''){
		$().customAlert();
		alert('Error!', '<p>Select the department!</p>');
		$("#branch1").parent().find("input:first").focus();	
		}
		else if(dept==''){
		$().customAlert();
		alert('Error!', '<p>Select the department!</p>');
		$("#dept1").parent().find("input:first").focus();	
		}
		
	else{
		$('#res2').html('<img id="img-spinner" src="images/load.gif" style="margin-top:40px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:24,name:name,pos:pos,dept:dept,bra:bra,emp:emp,rec:rec,auto:auto,email:email},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}
}

function useraccess(){
$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:29},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$("#dept9" ).combobox().change(function(){
	 var dep9 = $('#dept9').val();
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:30,dep9:dep9},
	success:function(data){
	$('#mainp').html(data);
	}
	});
});

function checkaccess(code,dep){
	var a = $('input[name=access' + code + ']:checked').val();
	if(a==1){b='YES'}else{b='NO'}
	if(code=='143'){
		$().customAlert();
		alert('Error!', '<p>No Changes Allowed for this specific functionality!</p>');
		e.preventDefault();	
		
	}
	else{
	$.ajax({
		url:'data.php',
		data:{id:25,code:code,dep:dep,b:b},
		success:function(data){
			
		}
	});
	}
}

function changelogin(){
$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:31},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function postpass(userid){
	
	var opass=$('#opass').val();
	var npass=$('#npass').val();
	var cpass=$('#cpass').val();

	if(opass==''){
		$().customAlert();
		alert('Error!', '<p>Enter your old password!</p>');
		}
		else if(npass==''){
		$().customAlert();
		alert('Error!', '<p>Enter a new password!</p>');
		}
		else if(cpass==''){
		$().customAlert();
		alert('Error!', '<p>Confirm password!</p>');
		}
	else{
	$("#aresp").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:26,opass:opass,npass:npass,cpass:cpass,userid:userid},
	success:function(data){
	$('#aresp').html(data);
	}
	});
	}
}


function sysvar(){
$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:32},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function postvariable(){
	
	var vname=$('#vname').val();
	var sysvar=$('#sysvar').val();
	if(sysvar==''){
		$().customAlert();
		alert('Error!', '<p>Select a category!</p>');
		}
		else if(vname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the variable name!</p>');
		}
		
	else{
	$("#aresp").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:27,sysvar:sysvar,vname:vname},
	success:function(data){
	$('#aresp').html(data);
	}
	});
	}
}
$("#sysvar2" ).combobox().change(function(){
	 var str = $('#sysvar2').val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var b=parts[1];
 	for(i=0;i<11;i++){
	$('#opt' + i).hide(); 
	}	
	
	 $('#opt'+a).show();
	$('#vname2').val('');$('.select').val('');
	 
});
function setvar(a){
	var str = $('#syscat'+a).val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var b=parts[1];
	$('#vname2').val(b);	
}


function editvariable(){
	
	 var str = $('#sysvar2').val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var sysvar=parts[1];
	 
	var str = $('#syscat'+a).val();
	 var parts=str.split('θ',2);
	 var bid=parts[0];
	var vname=$('#vname2').val();
	
	if(sysvar==''){
		$().customAlert();
		alert('Error!', '<p>Select a category!</p>');
		}
		else if(vname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the variable name!</p>');
		}
		
	else{
	$("#bresp").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:28,sysvar:sysvar,vname:vname,bid:bid},
	success:function(data){
	$('#bresp').html(data);
	}
	});
	}
}

function deletevariable(){
	
	 var str = $('#sysvar2').val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var sysvar=parts[1];
	 
	var str = $('#syscat'+a).val();
	 var parts=str.split('θ',2);
	 var bid=parts[0];
	var vname=parts[1];
	
	if(sysvar==''){
		$().customAlert();
		alert('Error!', '<p>Select a category!</p>');
		}
	else{
	$("#bresp").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:29,sysvar:sysvar,bid:bid,vname:vname},
	success:function(data){
	$('#bresp').html(data);
	}
	});
	}
}

function monthrep(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:33},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#monthsum" ).combobox({});
$( "#month1" ).combobox().change(function(){
	 var reg = $('#month1').val();
	window.open("output.php?id=4&reg=" + reg);
});
$( "#month14" ).combobox().change(function(){
	 var reg = $('#month14').val();
	window.open("output.php?id=1&reg=" + reg);
});
function monthbank(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:34},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function monthind(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:35},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterindbank(){
	 var mon = $('#monthsum').val();
	  var bank = $('#empbank').val();	
		window.open("output.php?id=2&mon=" + mon + '&' + "\nbank=" + bank);
}

function empsum(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:36},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function attendancerepemp(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:36.1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$("#cus9" ).combobox();
function enteremployeesumm(){

	var reg = $('#cus9').val();
	var from = $('#datepicker7').val();
	var to = $('#datepicker9').val();	
	if(reg==''||from==''||to==''){
	$().customAlert();
		alert('Error!', '<p>Enter all fields!</p>');
		e.preventDefault();	
	}else{
		window.open("output.php?id=6&reg=" + reg + '&' + "\nfrom=" + from + '&' + "\nto=" + to);
	}

}


$("#cus12" ).combobox().change(function(){
	 var reg = $('#cus12').val();
		window.open("output.php?id=13&reg=" + reg);

});
function indpayslip(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:37},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterindpayslip(){
	 var mon = $('#monthsum').val();
	  var emp = $('#cus19').val();	
	  if(mon==''||emp==''){
	$().customAlert();
		alert('Error!', '<p>Select both fields!</p>');
		e.preventDefault();	
	}else{
		window.open("output.php?id=7&mon=" + mon + '&' + "\nemp=" + emp + '&' + "\ncode=1");
	}
}
function payslip(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:38},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#month2" ).combobox().change(function(){
	var reg = $('#month2').val();
	window.open("output.php?id=7&mon=" + reg + '&' + "\ncode=2");
});
function attendancerep(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:39},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterattendance(){
	 var mon = $('#monthsum').val();
	  var branch = $('#branch').val();	
	  if(mon==''||branch==''){
	$().customAlert();
		alert('Error!', '<p>Select both fields!</p>');
		e.preventDefault();	
	}else{
		window.open("output.php?id=8&mon=" + mon + '&' + "\nbranch=" + branch + '&' + "\ncode=1");
	}
}
function leaverep(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:40},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterleaverep(){
	 var d1 = $('#datepicker3').val();
	 var d2 = $('#datepicker4').val();	
	 var view = $('input[name=viewall]:checked').val();
		if(!(view)){
		view=0;
		}
	if((d1==''||d2=='')&&view==0){
	$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();	
	}
	else if(view==1){
	window.open("output.php?id=9&code=1");
}
else{
		window.open("output.php?id=9&d1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=2");
	}
}

function leavesumm(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:40.1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterleavesumm(){
	 var d2 = $('#datepicker4').val();	
	 var type = $('#leavetype').val();
	if(d2==''||type==''){
	$().customAlert();
		alert('Error!', '<p>Enter the Date and Leave Type!</p>');
		e.preventDefault();	
	}

else{
		window.open("output.php?id=14&d2="+d2 + '&' + "\ntype=" + type);
	}
}

function emplist(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:41},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#emp99" ).combobox().change(function(){
	var reg = $('#emp99').val();
	window.open("output.php?id=10&reg=" + reg);
});
function mesrep(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:42},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function entermessages(){

 var d1 = $('#datepicker3').val();
 var d2 = $('#datepicker4').val();	
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("output.php?id=3&code=" + a);
	
}
else {var a=2;
window.open("output.php?id=3&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}
}

function logrepuser(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:43},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterlog(a){
 var d1 = $('#datepicker3').val();
 var d2 = $('#datepicker4').val();	
var user = $('#user').val();
if(user==null){user=0}

var t1 = $('#time1').val();
var t2 = $('#time2').val();
var t3 = $('#time3').val();
var t4 = $('#time4').val();
if(t1.length==1){
	t1=0+t1;
}
if(t3.length==1){
	t3=0+t3;
}


var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){

	window.open("output.php?id=11&code=" + a + '&' + "\nuser=" + user);
}
else {
d1=d1+t1+t2;
d2=d2+t3+t4;
	window.open("output.php?id=11&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2+ '&' + "\nuser=" + user);
}
}
function  timed1(){
	t1=$('#time1').val().length;
	if(t1==2){
		$('#time2').focus();
	}
}
function  timed2(){
	t3=$('#time3').val().length;
	if(t3==2){
		$('#time4').focus();
	}
}

function payerep(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:49.6},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function entermonded(){
	 var category = $('#category').val();
	 var reg = $('#month3').val();	
	window.open("output.php?id=12&reg=" + reg + '&' + "\ncategory=" + category);
}

$("#month3" ).combobox();
$("#category" ).combobox();
function pnine(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:49.7},
	success:function(data){
	$('#mainp').html(data);
	}
	}
	);
}
function enterpnine(){
	 var year = $('#empyear').val();
	 var emp = $('#empname').val();	
	window.open("p9a.php?code=1&year=" + year + '&' + "\nemp=" + emp);
}
function pten(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:49.8},
	success:function(data){
	$('#mainp').html(data);
	}
	}
	);
}
$( "#month4" ).combobox().change(function(){
	 var year = $('#month4').val();
	window.open("p10.php?id=66&year=" + year);
});
function ptena(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:49.9},
	success:function(data){
	$('#mainp').html(data);
	}
	}
	);
}
$( "#month5" ).combobox().change(function(){
	 var year = $('#month5').val();
	window.open("p10a.php?id=66&year=" + year);
});

function togglecol(){

	var val = $('#togglecol').val();
	if(val==0){
	$('.hider').show();$('.shower').width(33);
	val=1;
	}else{
	$('.hider').hide();$('.shower').width(63);
	val=0;
	}

	$('#togglecol').val(val);
}


function deluser(){
	
	var user = $('#stamper').val();
	
	if(user==''){
		$().customAlert();
		alert('Error!', '<p>Select a User!</p>');
		return;
		}

	else if(user=='admin'){
		$().customAlert();
		alert('Error!', '<p>You cannot delete the Admin User!</p>');
		return;		
	}
		else{
		$.confirm({
			'title'		: 'Delete User Confirmation',
			'message'	: 'You are about to delete this user from the system. This cannot be reversed later. Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#res2").html('<img id="img-spinner" src="images/load.gif" style="margin:40px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:32,user:user},
	success:function(data){
		$("#res2").html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		}
}


function empdeds(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:51},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterempdeds(){
	 var category = $('#category').val();
	 var reg = $('#empname').val();	
	if(category==''||reg==''){
		$().customAlert();
		alert('Error!', '<p>All fields are required!</p>');
		e.preventDefault();
	}
	else{
		window.open("output.php?id=15&reg=" + reg + '&' + "\ncategory=" + category);
	}
}



function enterempdeds2(reg){
	 var category = $('#category').val();
	if(category==''){
		$().customAlert();
		alert('Error!', '<p>All fields are required!</p>');
		e.preventDefault();
	}
	else{
		window.open("output.php?id=15&reg=" + reg + '&' + "\ncategory=" + category);
	}
}


function saltrack(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:52},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function leavestate(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:53},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterleavestate(){
	 var year = $('#datepicker8').val();
	 var reg = $('#empname').val();	
	if(year==''||reg==''){
		$().customAlert();
		alert('Error!', '<p>All fields are required!</p>');
		e.preventDefault();
	}
	else{
		window.open("output.php?id=16&reg=" + reg + '&' + "\nyear=" + year);
	}
}


function allp9(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:54},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#allp9" ).combobox().change(function(){
	var year = $('#allp9').val();
	window.open("p9a.php?code=2&year=" + year);
});


function attendrep(){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:55},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterattendrep(){

 var d1 = $('#datepicker3').val();
 var d2 = $('#datepicker4').val();	
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {var a=2;
window.open("output.php?id=17&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}
}
function syncattendance(){	
	$("#newstude").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'updateattendance.php',
	data:{status:1},
	success:function(data){
	$('#newstude').html(data);
	}
	});
}
