function filechange(event) {
	var files = event.target.files,
		file;
	if(files && files.length > 0) {
		file = files[0];
		if(file.size > 1024 * 1024 * 2) {
			alert('图片大小不能超过2MB!');
			return false;
		}
		var URL = window.URL || window.webkitURL;
		var imgURL = URL.createObjectURL(file);
		$("#img-show").attr("src", imgURL);
	}
}

function filechange1(event) {
	var files = event.target.files,
		file;
	if(files && files.length > 0) {
		file = files[0];
		if(file.size > 1024 * 1024 * 2) {
			alert('图片大小不能超过2MB!');
			return false;
		}
		var URL = window.URL || window.webkitURL;
		var imgURL = URL.createObjectURL(file);
		$("#img-show1").attr("src", imgURL);
	}
}
function filechange2(event) {
	var files = event.target.files,
		file;
	if(files && files.length > 0) {
		file = files[0];
		if(file.size > 1024 * 1024 * 2) {
			alert('图片大小不能超过2MB!');
			return false;
		}
		var URL = window.URL || window.webkitURL;
		var imgURL = URL.createObjectURL(file);
		$("#img-show2").attr("src", imgURL);
	}
}

function selectAll(obj, cname) {
	var checkboxs = document.getElementsByName(cname);
	for(var i = 0; i < checkboxs.length; i++) {
		checkboxs[i].checked = obj.checked;
	}
}
function sum(){
		var num = document.getElementById("num").value; 
		var price = Number(document.getElementById("price").innerHTML);
		var sum = num * price;
		document.getElementById("sum").innerHTML = sum;
}
/*function isselect(obj,cname) {
	alert("GG");
	/*var checkboxs = document.getElementsByName(cname);
	for(var i = 0; i < checkboxs.length; i++){
		if(checkboxs[i].checked == 'checked'){
			var ids = new Array();
			var id =  Number(checkboxs[i].id); 
			ids.push(id);		
			alert("GG");
		}		
	}
	var jsonString = JSON.stringify(ids);
		$.ajax({
			type:"post",
			url:"../html/delcart.php",
			data:{data:ids},
			cache:false;
			async:true,
			success:function(){
				alert("ok");
			}
		});
}*/
function showcheckbox(){
	document.getElementById("allselect").hidden = false;
	document.getElementById("selectall").hidden = false;
	document.getElementById("labelselect").hidden = false;
}

function modiphone() {
	document.getElementById("input-phone").readOnly = false;
	document.getElementById("input-phone").style.border = '1px solid black'
	document.getElementById("btn-modi-phone").disabled = true;
	document.getElementById("btn-save-phone").disabled = false;
	document.getElementById("file2").style.visibility = 'visible';
}/*function savephone() {
	document.getElementById("input-phone").readOnly = true;
	document.getElementById("input-phone").style.border = 'none';
	document.getElementById("btn-modi-phone").disabled = false;
	document.getElementById("btn-save-phone").disabled = true;
	document.getElementById("file2").style.visibility = 'hidden';
	document.getElementById("post-userinfo").click();
}*/



function redok(obj) {
	var a = document.getElementById(obj).getElementsByTagName("span");
	if(a[0].style.visibility == 'visible') {
		a[0].style.visibility = 'hidden';
	} else {
		var b = document.getElementsByTagName("span");
		for(var i = 1; i < b.length; i++) {
			b[i].style.visibility = 'hidden';
		}
		a[0].style.visibility = 'visible';
	}
}
function releastask(){
	document.getElementById("post-task").click();
}
function releasgoods(){
	document.getElementById("post-goods").click();
}
