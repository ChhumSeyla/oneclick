// preparing language file
var aLangKeys=new Array();
aLangKeys['en']=new Array();
aLangKeys['kh']=new Array();
aLangKeys['cn']=new Array();


//*************China Language**************************
aLangKeys['en']['aboutus']='About Us';
aLangKeys['en']['help']='Help';
aLangKeys['en']['loginRegister']='Login & Register';
aLangKeys['en']['contact']='Contact';
aLangKeys['en']['home']='Home';
aLangKeys['en']['Find Product by Category']='Find Product by Category';
aLangKeys['en']['Find Product by Brand']='Find Product by Brand';
aLangKeys['en']['Description']='Description';
aLangKeys['en']['Contact Number']='Contact Number';
aLangKeys['en']['Phone']='Phone';
aLangKeys['en']['Labtop']='Labtop';
aLangKeys['en']['Desktop']='Desktop';
aLangKeys['en']['Tablets']='Tablets';
aLangKeys['en']['Monitor']='Monitor';
aLangKeys['en']['Smart Watch']='Smart Watch';
aLangKeys['en']['Printer & Scanner']='Printer & Scanner';
aLangKeys['en']['Accessories Computer']='Accessories Computer';
aLangKeys['en']['Accessories Phone']='Accessories Phone';
aLangKeys['en']['Go To Shop']='Go To Shop';
aLangKeys['en']['LocationShop']='Location Shop ';
aLangKeys['en']['All Category']='All Category';




//*************China Language**************************
aLangKeys['kh']['aboutus']='អំពីយើង';
aLangKeys['kh']['help']='ជំនួយ';
aLangKeys['kh']['loginRegister']='ចូលគណនី នឹង ចុះឈ្មោះ';
aLangKeys['kh']['contact']='ទំនាក់ទំនង';
aLangKeys['kh']['home']='ផ្ទះ';
aLangKeys['kh']['Find Product by Category']='ស្វែងរកផលិតផលតាមប្រភេទ';
aLangKeys['kh']['Find Product by Brand']='ស្វែងរកផលិតផលតាមម៉ាក';
aLangKeys['kh']['Description']='ការពិពណ៌នា';
aLangKeys['kh']['Contact Number']='លេខ​ទំនាក់​ទំនង';
aLangKeys['kh']['Phone']='ទូរស័ព្ទ';
aLangKeys['kh']['Labtop']='កុំព្យូទ័រយួរដៃ';
aLangKeys['kh']['Desktop']='កំ​ព្យូ​ទ័​រ​លើ​តុ';
aLangKeys['kh']['Tablets']='Tablets';
aLangKeys['kh']['Monitor']='ម៉ូនីទ័រ';
aLangKeys['kh']['Smart Watch']='នាឡិកាវៃឆ្លាត';
aLangKeys['kh']['Printer & Scanner']='ម៉ាស៊ីនព្រីន និង ម៉ាស៊ីនស្កេន';
aLangKeys['kh']['Accessories Computer']='គ្រឿងបន្លាស់កុំព្យូទ័រ';
aLangKeys['kh']['Accessories Phone']='គ្រឿងបន្លាស់ទូរស័ព្ទ';
aLangKeys['kh']['Go To Shop']='ទៅកាន់ហាង';
aLangKeys['kh']['LocationShop']='ទីតាំងហាង :';
aLangKeys['kh']['All Category']='ផលិតផលទាំងអស់';


//*************China Language**************************
aLangKeys['cn']['aboutus']='关于我们';
aLangKeys['cn']['help']='救命';
aLangKeys['cn']['loginRegister']='登錄並註冊';
aLangKeys['cn']['contact']='聯繫';
aLangKeys['cn']['home']='家';
aLangKeys['cn']['Find Product by Category']='按類別查找產品';
aLangKeys['cn']['Find Product by Brand']='按品牌查找產品';
aLangKeys['cn']['Description']='描述';
aLangKeys['cn']['Contact Number']='聯繫電話';
aLangKeys['cn']['Phone']='電話';
aLangKeys['cn']['Labtop']='Labtop';
aLangKeys['cn']['Desktop']='Desktop';
aLangKeys['cn']['Tablets']='Tablets';
aLangKeys['cn']['Monitor']='監控';
aLangKeys['cn']['Smart Watch']='智能手錶';
aLangKeys['cn']['Printer & Scanner']='打印機和掃描儀';
aLangKeys['cn']['Accessories Computer']='配件電腦';
aLangKeys['cn']['Accessories Phone']='配件電話';
aLangKeys['cn']['Go To Shop']='去商店';
aLangKeys['cn']['LocationShop']='位置商店 ';
aLangKeys['cn']['All Category']='所有類別';

 $(document).ready(function() {
	 
          // onclick behavior
             $('.lang').click( function() {
				 //alert(sessionStorage.getItem("lang"));
				 //document.getElementById("demo").innerHTML = sessionStorage.getItem("lang");
                 var lang = sessionStorage.getItem("lang");//$(this).attr('id'); // obtain language id
                 // translate all translatable elements
                  $('.tr').each(function(i){
                      $(this).text(aLangKeys[lang][ $(this).attr('key') ]);
                   });
              } );
        });
// JavaScript Document