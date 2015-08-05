输入为数字，字符，下划线为合法，其它的都不合法！

    &lt;html&gt;  
    &lt;head&gt;&lt;h1&gt;the judgement of no useful input&lt;/h1&gt;  
    &lt;script language=&quot;javascript&quot; type=&quot;text/javascript&quot;&gt;  
        function fun(){  
            var str=my_form.user_name.value;  
                                      var str1=str.split(&quot;&quot;);  
            var i;  
            for(i=0;i&lt;str.length;i  )  
            {         
            if((str1[i]=='_')||(str1[i]&gt;='0'