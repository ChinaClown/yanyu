<!DOCTYPE html>
<?php
require('config.php');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.cclown.com/cdn/favicon.ico" type="image/x-icon" />
    <title>数据生成器</title>
    <style>
        body {
            padding: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /*文本被选中样式*/
        *::selection {
            color: #fff;
            background-color: #000;
        }

        *::-moz-selection {
            color: #fff;
            background-color: #000;
        }

        /*滚动条设置*/
        ::-webkit-scrollbar {
            width: 4px;
            height: 8px;
        }

        ::-webkit-scrollbar-track-piece {
            background-color: #eee;
        }

        ::-webkit-scrollbar-thumb:vertical {
            height: 5px;
            background-color: #9e9e9e;
        }

        ::-webkit-scrollbar-thumb:horizontal {
            width: 5px;
            background-color: #9e9e9e;
        }

        textarea,p{
            width: 600px;
            height: 300px;
            resize: none;
            display: block;
            margin: 0 auto;
            padding: 12px;
            outline: none;
            white-space: pre
        }
        p{border:1px solid #000;}
        textarea:focus {
            box-shadow: 0 0 12px #000;
        }

        #submit {
            width: 600px;
            height: 45px;
            border: none;
            color: #fff;
            background-color: #0984e3;
            font-weight: bold;
            font-size: 16px;
            display: block;
            margin: 12px auto;
            outline: none;
            transition: 0.4s;
        }

        #submit:hover {
            box-shadow: 0 0 12px #000;
        }
        #record{display:none;}
    </style>
</head>

<body>

    <span id="record">
        <?php
        $total="select id from word";
        $number=mysqli_num_rows(mysqli_query($con,$total));
        echo $number;
?>
    </span>
    <textarea placeholder="每一条内容要用换行隔开" id="sourcedata"></textarea>
    <input type="submit" value="生成" id="submit">
    <textarea id="resultdata" placeholder="直接复制使用"></textarea>
    
    <script>
        var result=document.getElementById("resultdata");
        resultdata.value="insert into word values";
        var source=document.getElementById("sourcedata");
        var number=document.getElementById("record").innerHTML;
        var x=parseInt(number)+1;
        var data;
        document.getElementById("submit").onclick=function(){
            resultdata.value="insert into word values";
            x=parseInt(number)+1;
            data="";
            var string=source.value.toString();
            var arr=string.split("\n");
            for(var i=0;i<arr.length;i++){
                data+="\n("+x+","+"\'"+arr[i]+"\'"+",0),";
                x++;
            }
            console.log(data);
            console.log(data.length);
            resultdata.value+=data.substring(0,data.length-1)+";";
        }
        
        
    </script>
</body>
    
</html>