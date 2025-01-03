<?php         
    if(filter_input(INPUT_GET,'letter')==NULL){
        $letterName = "aa";
    }
    else
    {$letterName = filter_input(INPUT_GET,'letter');}
    
    //$lastPage = filter_input(INPUT_SERVER, 'HTTP_REFERER');
    $lp = filter_input(INPUT_GET, 'lp');
    if($lp == "q")
        $lastPage = "qaida.php";
    else if($lp == "g")
        $lastPage = "ginti.php";
    else if($lp == "r")
        $lastPage = "rung.php";
    else if($lp == "gk")
        $lastPage = "gk.php";
    else 
        $lastPage = "dashboard.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    
var c = 1;
var lastpage = '<?php echo $lp; ?>';
var letterName = '<?php echo $letterName; ?>';
var imgArray = new Array();
var audArray = new Array();
var vidArray = new Array();
var wordArray = new Array();


var letterTitles = {
"aa" 	:"آ",  
"alif" :"ا" , 
"bay" 	:"ب",  
"pay" 	:"پ",  
"tay" 	:"ت",  
"ttay"	:"ٹ",  
"say" 	:"ث",  
"jeem" :"ج" , 
"chay" :"چ" , 
"hay" 	:"ح",  
"khay" :"خ" , 
"daal" :"د" , 
"ddaal":"ڈ" , 
"zaal" :"ذ" , 
"ray" :"ر"  ,
"day" :"ڑ"  ,
"zay" :"ز"  ,
"zhay":"ژ"  ,
"seen":"س"  ,
"sheen":"ش" , 
"suad" :"ص" , 
"zuad" :"ض" , 
"tuay" :"ط" , 
"zuay" :"ظ" , 
"ain" :"ع"  ,
"ghain":"غ" , 
"fay" :"ف"  ,
"qaaf" :"ق" , 
"kaaf" :"ک" , 
"gaaf" :"گ" , 
"laam" :"ل" , 
"meem" :"م" , 
"noon" :"ن" , 
"wow" :"و"  ,
"hey" :"ہ"  ,
"hamza" :"ء",  
"yay" :"ی"  ,
"yey" :"ے"  ,
"bha" :"بھ" ,
"pha" :"پھ" ,
"tha" :"تھ" ,
"ttha":"ٹھ" ,
"jha" :"جھ" ,
"chha":"چھ" ,
"dha" :"دھ" ,
"ddha":"ڈھ" ,
"kha" :"کھ" ,
"gha" :"گھ" ,
"aik" 	:"ایک" 	 ,
"do" 	:"دو" 	 ,
"teen" 	:"تین" 	 ,
"chaar" :"چار" 	 ,
"paanch":"پانچ"  ,
"chhay" :"چھ" 	 ,
"saat" 	:"سات" 	 ,
"aath" 	:"آٹھ" 	 ,
"nau" 	:"نو" 	 ,
"das" 	:"دس" 	 ,
"safaid" 	:"سفید"     ,
"peela" 	:"پیلا" 	    ,
"laal" 		:"لال" 	    ,
"bhoora" 	:"بھورا"    ,
"kala" 		:"کالا" 	    ,
"neela" 	:"نیلا" 	    ,
"naranji" 	:"نارنجی"   ,
"hara" 		:"ہرا" 	    ,
"zarae"              : "ذرائع",
"paishay":"پیشے",
"jaghain"              : "جگہیں",
"cheezain":"چیزیں",
"phal"              : "پھل",
"sabziyan":"سبزیاں",
"janglijanwar"              : "جنگلی جانور",
"gharailujanwar":"گھریلو جانور",
"keeray"              : "کیڑے",
"parinday":"پرندے"
};

var gkWords = {
"paishay"		:"daal_01,ddaal_01,ddaal_06,hay_01,hay_02,kha_02,meem_01,khay_01,laam_01,pay_01,saat_06,tuay_03"
,"zarae"		:"zaal_06,bay_01,yay_02,do_03,gaaf_03,jeem_02,ray_06,ttay_01,ray_02,seen_02"
,"cheezain"		:"aa_01,aa_04,ain_02,bay_02,chay_01,chay_02,chha_01,ddaal_04,ddaal_05,fay_02,gha_04,hey_02,jha_03,kaaf_01,kaaf_02,laam_02,pay_02,qaaf_01,qaaf_02,qaaf_05,qaaf_06,tha_04,ttay_02,tuay_01,zay_02,zhay_06,zuay_06"
,"jaghain"		:"alif_03,bay_03,yay_03,ain_03,ddaal_03,fay_03,jeem_03,jha_06,khay_03,laam_03,meem_03,seen_03,suad_03,noon_03,daal_03,tay_03,ttha_03,zay_03,say_03"
,"sabziyan"		:"seen_05,aa_05,alif_05,bay_05,bha_04,bha_05,chay_05,gaaf_05,ttay_06,tay_05,kaaf_05,kha_06,laam_05,meem_05,pay_05,sheen_05,zay_05"
,"phal"			:"say_06,aa_06,alif_06,bay_06,chay_06,chhay_04,fay_06,gaaf_06,hara_01,jeem_06,kaaf_06,khay_05,khay_06,meem_06,noon_06,noon_05,pay_06,seen_06,tay_06,zay_06"
,"gharailujanwar"       :"bha_01,bay_04,yey_04,daal_04,gha_05,khay_04,meem_04,safaid_06"
,"janglijanwar"         :"alif_04,chay_04,ghain_04,hey_04,laam_04,seen_04,pay_04,ray_04,zay_04,zuad_01"
,"parinday"		:"ain_04,day_04,fay_04,kaaf_04,safaid_06,tuay_04"
,"keeray"		:"hay_04,chha_02,kala_06,tay_04"
};
var words;

if(lastpage == "gk"){
        words = gkWords[letterName];    
    }
    else
    {
        //var words = letterName + '_01,' + letterName + '_02,' + letterName + '_03,' + letterName + '_04,' + letterName + '_05,' + letterName + '_06';
        var words = `${letterName}_01,${letterName}_02,${letterName}_03,${letterName}_04,${letterName}_05,${letterName}_06`;
        
    }
wordArray = words.split(",");    
//alert(wordArray.length);

const loadStuff = async () =>{
for(var i=0; i<=wordArray.length-1;i++)
{
    var j = i+1;
    imgArray[i]=new Image();
    audArray[i]=new Audio();
//https://storage.googleapis.com/aghaz-urdu/aaghazres/raw/aa_11.webm
    imgArray[i].src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/drawable/${wordArray[i]}.jpg`;
    audArray[i].src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/${wordArray[i]}.mp3`;
    vidArray[i] = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/${wordArray[i].split("_")[0]}_1${wordArray[i].charAt(wordArray[i].length-1)}.webm`;
  //  vidArray[i] = new Video();
  //  vidArray[i].src = 'https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/${letterName}_1${ j }.webm';
}
};


loadStuff();
/*
function PlaySound(soundobj) { 
  var thesound= document.getElementById(soundobj);
  thesound.play();
}
*/


const PlaySound = (soundobj) =>{
  const thesound = document.getElementById(soundobj);
  thesound.play();
  //console.log("ArrowFunction1");
};

 const PlayVideo = () => {
  var video= document.getElementById('videoDiv');
  var wordcard= document.getElementById('wordcardDiv');
  var thevideo = document.getElementById('videoLafz');
  video.style.display = "block";
  wordcard.style.display = "none";
//  alert(thevideo.src);
//  theImage.style.display = "none";
//  thevideo.style.display = "block";
//  document.getElementById('bottomImgRight').style.visibility = "hidden";
//  document.getElementById('bottomImgLeft').style.visibility = "hidden";
//  document.getElementById('btnVideo').style.visibility = "hidden";

  thevideo.play();
  
  thevideo.onended= () => {
//  theImage.style.display = "block";
//  thevideo.style.display = "none";
//  document.getElementById('bottomImgRight').style.visibility = "visible";
//  document.getElementById('bottomImgLeft').style.visibility = "visible";
////  document.getElementById('btnVideo').style.visibility = "visible";
  video.style.display = "none";
  wordcard.style.display = "block";
  console.log("Video Ended");
  };
} 
 
const goBackAndForth = (num) => {
    
    c = c + num;
    //alert(c);
    if(c>=1 && c <=wordArray.length)
    {
    letterName = wordArray[c-1].split("_")[0];
    document.getElementById('letterCell').innerHTML=(letterTitles[letterName]);
    var sound= document.getElementById('audioLafz');
    var image = document.getElementById('wordcardImg');
    var video = document.getElementById('videoLafz');
    var btn = document.getElementById('btnVideo');
    

//        video.onerror = function() {
//        //alert('error, couldn\'t load');
//        btn.style.visibility = "hidden";
//        // don't show video element
//    };
//    
//    video.oncanplay = function() {
//        btn.style.visibility = "visible";
//        //alert('Hmmm');
//        // don't show video element
//    };
    
    
    image.src = imgArray[c-1].src;
    sound.src = audArray[c-1].src;
    document.getElementById('audioHarf').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/${letterName}.mp3`;
    //"\aaghazres\raw\blank.mp3"
    
    $.get(vidArray[c-1])
    .done(() => { 
        // exists code 
       video.src = vidArray[c-1];
       btn.style.visibility = "visible";
    }).fail(() => { 
        btn.style.visibility = "hidden";
        //alert('failed');
    });
  
    //video.src = vidArray[c-1];
    
    
    $.get(`https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/${letterName}_00.mp3`)
    .done(() => { 
       document.getElementById('audioHarf00').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/${letterName}_00.mp3`;
    }).fail(() => { 
       document.getElementById('audioHarf00').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/raw/blank.mp3`;
       //alert('failed');
    });
    
    if(c==1){
        document.getElementById('bottomImgRight').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/cancel.png`;        
    }
    else
    {
        document.getElementById('bottomImgRight').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/bottom_right.jpg`;        
    }
    if(c==wordArray.length){
        document.getElementById('bottomImgLeft').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/cancel.png`;        
    }
    else
    {
        document.getElementById('bottomImgLeft').src = `https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/bottom_left.jpg`;        
    }
    }
    else 
    {
        location.href='<?php echo $lastPage; ?>';        
    }
    console.log(c);
}

</script>

    <head>
        <meta charset="UTF-8">
        <title>
            آغاز اردو: بنیادی اردو کے لیئے تعلیمی سوفٹویئر (قاعدہ، گنتی، معلومات عامہ اور بہت کچھ)
        </title>
        <link   rel="icon" 
                type="image/jpg" 
                href="https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/icon_app.jpg" />    
        <!--
        <link rel="stylesheet" href="assets/css/menu.css">
        -->
    </head>
    <body align="center" style="background-image: url('https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/AghazBG.png');" onload="goBackAndForth(0);">

<audio id="audioHarf" ></audio>
<audio id="audioLafz" ></audio>
<audio id="audioHarf00" ></audio>
<?php include("leftside.php"); ?>
<div id="wordcardDiv" border="1px" align="center">
<table id="tblWordCard" style="background-color: black;" height="425" width="825" align="center">
    <tr>
        <td width="775px" id="letterCell" align="center" style="cursor: pointer; color: white;font-size: 60px; font-weight: bold" onclick="PlaySound('audioHarf');" ></td>
        <td align="right" width="50px"><img src="https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/cancel.png" onclick="location.href='<?php echo $lastPage; ?>';" style="cursor: pointer"></td>
    </tr>
    <tr>
        <td colspan="2" align="center">            
            <img src="https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/Spinner-1s-200px.svg" id="wordcardImg" onclick="PlaySound('audioHarf00');setTimeout(() => {PlaySound('audioLafz')} , 750);" style="border-width: 1px;cursor:pointer; height: 380px;width: 820px;border-radius: 25px;" />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="825px">
                <tr>
                    <td align="left" width="312px"><img valign="top" id="bottomImgLeft" alt="آگے" src="https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/bottom_left.jpg" style="cursor:pointer;" onclick="goBackAndForth(1);" /></td>
                    <td align="center" width="76px"><img valign="top" id="btnVideo" alt="Video" src="https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/video.jpg" style="cursor:pointer;visibility: show" onclick="PlayVideo();" /></td>
                    <td align="right" width="312px"><img valign="top" id="bottomImgRight" alt="پیچھے" src="https://storage.googleapis.com/main-depot-231416.appspot.com/aaghazres/bottom_right.jpg" style="cursor:pointer;" onclick="goBackAndForth(-1);" /></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<div id="videoDiv" style="display: none;" align="center">
  <table id="tblVideo" style="background-color: black" height="425" width="700" style="border-width: 1px,border-radius:25px; overflow: hidden;">
    <tr>
        <td align="center" valign="center">
                        <video id="videoLafz" height="320" width="480" /></video>
        </td>
    </tr>
</table>
</div>
<?php include("rightside.php"); ?>

    </body>
</html>
