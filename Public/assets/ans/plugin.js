var storage = window.localStorage;
var initData = {};
var formData = {};


countdown = function(userOptions)
{

	var h,m,s,t;
	var init = function()
	{
		userOptions.time = userOptions.lefttime*60 ;
		s = userOptions.time%60;
		m = parseInt(userOptions.time%3600/60);
		h = parseInt(userOptions.time/3600);
	}

	var setval = function()
	{
		if(s >= 10)
			userOptions.sbox.html(s);
		else
			userOptions.sbox.html('0'+s.toString());
		if(m >= 10)
			userOptions.mbox.html(m);
		else
			userOptions.mbox.html('0'+ m);
		if(h >= 10)
			userOptions.hbox.html(h);
		else
			userOptions.hbox.html('0'+ h);
	}

	var step = function()
	{
		if(s > 0)
		{
			s--;
		}
		else
		{
			if(m > 0)
			{
				m--;
				s = 60;
				s--;
			}
			else
			{
				if(h > 0)
				{
					h--;
					m = 60;
					m--;
					s = 60;
					s--;
				}
				else
				{
					clearInterval(interval);
					userOptions.finish();
					return ;
				}
			}
		}
		setval();
	};
	init();
	interval = setInterval(step, 1000);
};


function set(k,v){
	var _this = this;
	if(typeof(_this) == "object"&& Object.prototype.toString.call(_this).toLowerCase() == "[object object]" && !_this.length)
	{
		_this[k] = {'value':v};
		storage.setItem('questions',$.toJSON(formData));
	}
}

function clearStorage()
{
	storage.removeItem('questions');
}

function submitPaper()
{
	$('#submodal').modal('hide');
	//alert(1);
document.getElementById('form1').submit();
	//$('#form1').submit();
	//alert(1);
	clearStorage();
}

function markQuestion(rel,isTextArea)
{
	//alert(1);
	var t = 0;
	var f = false;
	try
	{
		f = $('#form1 :input[rel='+rel+']');
	}catch(e)
	{
		f = false;
	}

	if(!f)return false;

	if(isTextArea)
	{
		if($('#form1 :input[rel='+rel+']').val() && $('#form1 :input[rel='+rel+']').val() != '' && $('#form1 :input[rel='+rel+']').val() != '<p></p>')t++;
	}
	else
	{$('#form1 :input[rel='+rel+']').each(function(){if($(this).is(':checked') && $(this).val() && $(this).val() != '' && $(this).val() != '<p></p>')t++;});}

	if(t > 0)
	{
		if(!$('#sign_'+rel).hasClass("btn-primary"))
			$('#sign_'+rel).addClass("btn-primary");
	}
	else
	{
		$('#sign_'+rel).removeClass("btn-primary");
	}
	$('.yesdonumber').html($('#questionindex .btn-primary').length);
}


function batmark(rel,value)
{
	//alert(1);
	if(value && value != '')
	{
		if(!$('#sign_'+rel).hasClass("btn-primary"))$('#sign_'+rel).addClass("btn-primary");
	}
	else
	$('#sign_'+rel).removeClass("btn-primary");
	$('.yesdonumber').html($('#questionindex .btn-primary').length);
}


