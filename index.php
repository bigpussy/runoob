<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" id="wpProQuiz_front_style-css" href="static/wpProQuiz_front.min.css" type="text/css" media="all">
<link rel="stylesheet" href="static/codemirror.min.css">
<link href="static/normalize.min.css" rel="stylesheet">
<script src="https://cdn.staticfile.org/codemirror/5.48.0/addon/mode/simple.min.js"></script>
<link rel="stylesheet" href="//cdn.staticfile.org/codemirror/5.48.0/codemirror.min.css">
<link href="static/modern-business.css" rel="stylesheet">
<link href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<link href="static/style.css" rel="stylesheet">
<script src="static/jquery.min.js"></script>
<script src="static/codemirror.min.js"></script>
<script src="static/python.js"></script>
<title>哈哈</title>
</head>
<body>

	<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
					<div id="compiler" class="panel-heading">
			<form class="form-inline" role="form">
				 <button type="button" class="btn btn-success" id="submitBTN" disabled="disabled"><i class="fa fa-send-o"></i> 点击运行</button>
				 				<select class="form-control" id="sel1">
				    <option  value="https://c.runoob.com/compile/5577">TypeScript 在线工具</option><option  value="https://c.runoob.com/compile/2960">Kotlin 在线工具</option><option  value="https://c.runoob.com/compile/73">Pascal 在线工具</option><option  value="https://c.runoob.com/compile/66">Lua 在线工具</option><option  value="https://c.runoob.com/compile/22">Node.js 在线工具</option><option  value="https://c.runoob.com/compile/21">Go 在线工具</option><option  value="https://c.runoob.com/compile/20">Swift 在线工具</option><option  value="https://c.runoob.com/compile/19">RUST 在线工具</option><option  value="https://c.runoob.com/compile/18">Bash 在线工具</option><option  value="https://c.runoob.com/compile/17">Perl 在线工具</option><option  value="https://c.runoob.com/compile/16">Erlang 在线工具</option><option  value="https://c.runoob.com/compile/15">Scala 在线工具</option><option  value="https://c.runoob.com/compile/14">C# 在线工具</option><option  value="https://c.runoob.com/compile/13">Ruby 在线工具</option><option  value="https://c.runoob.com/compile/12">C++ 在线工具</option><option  value="https://c.runoob.com/compile/11">C 在线工具</option><option  value="https://c.runoob.com/compile/10">Java 在线工具</option><option  value="https://c.runoob.com/compile/9">Python3 在线工具</option><option selected="selected" value="https://c.runoob.com/compile/6">Python 在线工具</option><option  value="https://c.runoob.com/compile/1">PHP 在线工具</option>			  	</select>
			  	
				 <label class="pull-right"><strong style="font-size: 16px"><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=ssbDyoOAgfLU3crf09venNHd3w" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> 邮件反馈</a></strong></label>
				
				 <button type="button" class="btn btn-default" id="clearCode" ><i class="fa fa-eraser" aria-hidden="true"></i> 清空</button>
			</form>
			</div>
			<div class="panel-body">
			<form role="form" id="compiler-form">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-7">
                    <textarea class="form-control"  id="code" name="code" rows="18"># -*- coding: UTF-8 -*-
print("Hello World!");</textarea>
                  </div>
                  <div class="col-md-5">
                    <textarea placeholder="运行结果……" class="form-control" id="compiler-textarea-result" rows="18">Hello World!</textarea>
                  </div>
                </div>
              </div>
             
             
            </form>
			</div>
		</div>
	</div>
	<!--
	<div class="col-md-12">
	
		<div id="about" class="panel panel-default">
			<div class="panel-heading">概述</div>
			<div class="panel-body">
			内容
			</div>
        </div>
        
	    <div id="author" class="panel panel-default">
			<div class="panel-body">
              <p>该实例由 <a target="_blank" href="http://www.runoob.com/">菜鸟教程</a> 整理。</a></p>
			</div>
		</div>
	</div>
	-->
</div>
<script>
var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
	lineNumbers: true,
	matchBrackets: true,
	mode: "text/x-python",
	indentUnit: 4,
	indentWithTabs: true,
});
btn = $("#submitBTN");
editor.on("change",function(editor,change){
	btn.prop('disabled', false);
});
btn.click(function() {
	btn.prop('disabled', true);
	loadingdata = '程序正在运行中……';
	$("#compiler-textarea-result").val(loadingdata);
  
	code = editor.getValue();
	stdin = '';
	if ($('#stdin').length > 0) { 
		stdin = $("#stdin").val();
	}
	runcode = 0;
	$.post("compile.php",{code:code,stdin:stdin,language:runcode, fileext:"py"},function(data){
		if(runcode==18) {
			data.output = data.output.replace("Free Pascal Compiler version 2.6.2-8 [2014/01/22] for x86_64\nCopyright (c) 1993-2012 by Florian Klaempfl and others\n", "");
			data.errors = data.errors.replace("/usr/bin/ld.bfd: warning: /usercode/link.res contains output sections; did you forget -T?\n", "");
		}
		if(runcode==8) {
			data.errors = data.errors.replace("/usercode/script.sh: line 69: bc: command not found", ""); 
		}
		console.log(data);
		$("#compiler-textarea-result").val(data.output + data.errors);
	});
	setTimeout(function(){
        btn.prop('disabled', false);
    }, 10*1000);
});
$("#clearCode").click(function() {
	var r=confirm("确认清空？");
	if (r==true){
		editor.setValue("");
		editor.clearHistory();
		$("#compiler-textarea-result").val("");
		btn.prop('disabled', true);
	}
});

$(function(){
  // bind change event to select
  $('#sel1').on('change', function () {
      var url = $(this).val(); // get selected value
      if (url) { // require a URL
          window.location = url; // redirect
      }
      return false;
  });
});

</script>

<div class="col-md-12">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 移动版 自动调整 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5751451760833794"
     data-ad-slot="1691338467"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>

(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<br>
<hr>
<!-- Footer -->
<footer>
	<div class="row">
		<div class="col-lg-12">
			<p>Copyright &copy; <a href="//www.runoob.com/">菜鸟教程</a> 2019</p>
		</div>
	</div>
</footer>

</div>

<div style="display:none;">
<script>
var _hmt = _hmt || [];
(function() {
	// 统计
	var hm = document.createElement("script");
	hm.src = "https://hm.baidu.com/hm.js?68c6d4f0f6c20c5974b17198fa6fd40a";
	var s = document.getElementsByTagName("script")[0]; 
	s.parentNode.insertBefore(hm, s);
})();
$(function() {
	//代码高亮
	$('pre').each(function() {
		if(!$(this).hasClass("prettyprint")) {
			$(this).addClass("prettyprint");
		}
	});
})
</script>

</div>

<script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</body>
</html>