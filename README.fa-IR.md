[English](./README.md) | فارسی
# پکیج CI Multi Captcha(CIMC)
این پکیج برای فریم ورک کُدایگنایتر نسخه 4 به بالا قابل استفاده است. این پکیج از چهار سرویس کپچا پشتیبانی میکند،شامل سرویس آرکپچا(سرویس حرفه ای کپچا،شامل حدس تصویر،پازل و ... ساخت ایران)، بی بات(سرویس کپچای پازلی ساخت ایران)، ریکپچا(ساخت گوگل) و اچ کپچا. استفاده کننده از این پکیج میتواند مشخص کند که از کدام کپچا استفاده شود و یا مشخص کند که به صورت تصادفی یک کپچا انتخاب شود.این پکیج از محدودیت نرخ فعالیت نیز پشتیبانی می کند.

![Demo CIMC](./image/demo_cimc-fa-IR.gif)
# آموزش تصویری نصب و راه اندازی
ما اینجا آموزش های مربوط به راه اندازی، نصب و نحوه استفاده صحیح از این پکیج را قرار میدهیم.برای اطلاع از روش صحیح استفاده از این پکیج لطفا اقدام به تماشایی ویدیو های آپلود شده کنید.
[ویدیوهای آموزشی در آپارات](https://www.aparat.com/playlist/1509312)
# روش نصب بر روی فریم ورک کُدایگنایتر
### روش اول : نصب با کامپوزر
بهترین روش نصب استفاده از کامپوزر است.با فرض اینکه کامپوزر بر روی سیستم شما نصب است از دستور زیر استفاده کنید::

```console
composer require datamweb/codeigniter-multi-captcha:dev-main
```

### روش دوم: نصب به صورت دستی
ابتدا آخرین نسخه از پکیج را از [دانلود](https://github.com/datamweb/CodeIgniter-Multi-Captcha/releases) دریافت کنید.
سپس فایل فشرده دانلود شده را در مسیر ```app/ThirdParty``` اکسترکت کنید.
اکنون به مسیر ```app/Config``` بروید. و مورد زیر را در فایل ```Autoload.php``` اضافه کنید و فایل را ذخیره کنید.
```
    public $psr4 = [
	//Add this line
        'Datamweb\CIMC' 	        => APPPATH . 'ThirdParty\CIMultiCaptcha',
    ];
    
```
در گام بعد به مسیر ```app/Config``` بروید در فایل ```Validation.php``` مقادیر زیر را اضافه کنید.

```
    public $ruleSets = [
        // Add this line
        '\Datamweb\CIMC\Validation\RulesCIMC',
    ];
    public $templates = [
        // Add this line
        'CIMC_ERRORS_LIST'      => 'Datamweb\CIMC\Validation\Views\_list.php',
        // Add this line
        'CIMC_ERRORS_SINGLE'    => 'Datamweb\CIMC\Validation\Views\_single.php',
    ];
    
```

در مرحله بعد, به مسیر ```app/Config``` بروید ومقادیر زیر را به فایل ```Filters.php``` اضافه کنید..
یاداشت:: این ویژگی از نسخه  V1.0.2pre-alpha به بعد پشتیبانی میشود. شما با این ویژگی میتوانید محدودیت نرخ فعالیت را فعال کنید. پارامتر های محدودیت نرخ فعالیت از طریق فایل  ```app/ThirdParty/CIMultiCaptcha/Config/MultiCaptchaCIConfig.php``` قابل ویرایش است..
Rate Limiting می تواند تاثیر عملکرد بات های مخرب بر روی وبسایت و یا برنامه ها را متوقف کند. حملاتی که توسط Rate Limiting متوقف می شوند، شامل حملات Brute force ،DoS ، DDoS و Web scraping هستند. در ضمن Rate Limiting می تواند از فعالیت بیش از حد API ها که لزوما به دلیل فعالیت بات ها نیست، جلوگیری کند..
[اطلاعات بیشتر در مورد محدودیت نرخ فعالیت](https://arcaptcha.ir/blog/rate-limiting-%DA%86%DB%8C%D8%B3%D8%AA%D8%9F).

```
    public $aliases = [
        //add for mix rate limit and captcha
        'rate_limit_by_captcha' => \Datamweb\CIMC\Filters\RateLimitByCaptcha::class,
    ];
    public $filters = [
        //add for mix rate limit and captcha in all url
        'rate_limit_by_captcha' => ['before' => ['/*']]
    ];
    
```
پیشنمایشی از محدودیت نرخ فعالیت :: number_of_action : 5 ,captcha_name: hcaptcha
![پیشنمایش محدودیت نرخ فعالیت](./image/ratelimiting-fa-IR.gif)
به صورت پیش فرض محدودیت های نرخ فعالیت در فایل  ```MultiCaptchaCIConfig.php``` به صورت زیر تنظیم شده است.شما میتوانید نسبت به لغو این ویژگی ویا تغییر پرامترها اقدام کنید.
```
    public $rateLimit=[
        'rate_limit_on'                         =>   true,                              //(true | false)
        'number_of_action'                      =>   25,                                //number of tokens the bucket holds
        'refill_period'                         =>   HOUR,                              //amount of time it takes the bucket to refill (SECOND |MINUTE|HOUR|DAY|WEEK|MONTH|YEAR|DECADE)
        'captcha_name'                          =>   'recaptcha',                       //The name of the captcha used on the Rate Limit page. (arcaptcha|recaptcha|hcaptcha|bibot)
        'rate_limit_view'                       =>   'Datamweb\CIMC\Views\rate_limit',           //The view of used on the Rate Limit page.
    ];
    
```
# فایل پیکر بندی پکیج
پیش از استفاده از این پکیج شما نیازمند دریافت دو کلید اختصاصی از هر یک از سرویس دهنده های کپچا هستید.به منظور دریافت کلید ها شما باید نسبت به ثبت نام در هر یک از سرویس دهنده های کپچا و نسبت به دریافت کلید ها اقدام کنید. برای دریافت کلید های سرویس آرکپچا به آدرس [ثبت نام آرکپچا]( https://arcaptcha.ir/sign-up)
 ، برای دریافت کلید های بی بات به آدرس [ثبت نام بی بات](https://bibot.ir/panel/user/signup/)
 ، برای دریافت کلید های ریکپچا به آدرس [ثبت نام ریکپچا](https://www.google.com/recaptcha/admin/create) و برای دریافت کلیدهای اچ کپچا به آدرس [ثبت نام اچ کپچا]( https://hcaptcha.com/?r=e4b628e9c617)
 بروید.مراحل ثبت نام را طی و نسبت به ثبت دامنه وب سایت خود و دریافت کلید ها اقدام کنید.

  سپس به مسیر ```app/ThirdParty/CIMultiCaptcha/Config``` بروید و مقادیر کلید های```site_key``` و ```secret_key``` مربوطه را در فایل ```MultiCaptchaCIConfig.php``` جایگزین کنید.
  
در صورت نیاز به تغییر رنگ،تم،اندازه و ... از طریق همین فایل اقدام کنید.
در خصوص زبان کپچا، پکیج به صورت پیشفرض هر زبانی که در فریم ورک تنظیم شده باشد را مد نظر قرار میدهد و کپچا را با همان زبان نمایش میدهد.
در صورتی که نیاز به تنظیم سفارشی زبان کپچا دارید از طریق همین فایل مقادیر```lang``` را تنظیم کنید.نکته مهم در این خصوص دو سرویس دهنده ایرانی (آرکپچا و بی بات) تنها از دو زبان فارسی(fa) و انگلیسی (en) پشتیبانی میکنند، این محدودیت مربوط به سرویس دهنده های کپچا میباشند نه پکیج



# روش استفاده از (CIMC)
به طور کلی نحوه استفاده از این پکیج به دو صورت خواهد بود. روش اول انتخاب سرویس توسط برنامه نویس انجام شود،برای مثال برنامه نویس قصد دارد فقط از سرویس ریکپچا استفاده کند بنابراین باید طبق نمودار زیر مسیر آبی رنگ را طی کند.مورد بعدی برنامه نویس در مشخص کردن سرویس نقشی ندارد و سیستم به صورت تصادفی یکی از سرویس ها را انتخاب میکند، برای این کار باید مسیر مشکی رنگ را طی کنید.
```mermaid
  flowchart LR;
      A[CI MULTI CHAPTCHA]-->B{"انتخاب کپچا توسط برنامه نویس؟"};
      classDef c-Rc color:#022e1f,fill:#1a73e8;
      classDef c-Hc color:#022e1f,fill:#22c5c7;
      classDef c-Ac color:#022e1f,fill:#867ee2;
      classDef c-Bc color:#022e1f,fill:#ccc;
      classDef black color:#fff,fill:#000;
      B--بله-->C["چطور استفاده کنم؟"]:::black;
      
      C-->U["ریکپچا را انتخاب میکنم"]:::c-Rc;
      U--Views-->Q["echo CIMC_JS('recaptcha');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'recaptcha']);"]:::c-Rc;
      U--Controller-->W["CIMC_FIELD('recaptcha) => CIMC_RULE(),"]:::c-Rc;
     
      C-->H["اچ کپچا را انتخاب میکنم"]:::c-Hc;
      H--Views-->J["echo CIMC_JS('hcaptcha');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'hcaptcha']);"]:::c-Hc;
      H--Controller-->G["CIMC_FIELD('hcaptcha) => CIMC_RULE(),"]:::c-Hc;  

      C-->I[آرکپچا را انتخاب میکنم]:::c-Ac;
      I--Views-->O["echo CIMC_JS('arcaptcha');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'arcaptcha']);"]:::c-Ac;
      I--Controller-->P["CIMC_FIELD('arcaptcha) => CIMC_RULE(),"]:::c-Ac;
      
      C-->X["بی بات را انتخاب میکنم"]:::c-Bc;
      X--Views-->V["echo CIMC_JS('bibot');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'bibot']);"]:::c-Bc;
      X--Controller-->N["CIMC_FIELD('bibot) => CIMC_RULE(),"]:::c-Bc;
      
      B--خیر-->D["چطور استفاده کنم؟"]:::black;
      D---Views:::black-->F["echo CIMC_JS('randomcaptcha');\n echo CIMC_ERROR();\n echo CIMC_HTML(['captcha_name'=>'randomcaptcha']);"]:::black; 
      D---Controller:::black-->T["CIMC_FIELD('archaptcha,recaptcha,bibot') => CIMC_RULE(),"]:::black; 
```
# برای بهتر شدن
این پکیج به صورت منبع باز ارائه شده است.در صورتی که نیاز به گفتگو ،مطرح کردن ایده و ... دارید از طریق [گفتگو](https://github.com/datamweb/CodeIgniter-Multi-Captcha/discussions) اقدام کنید.همچنین در صورت وجود باگ، لطفا از طریق [گزارش باگ](https://github.com/datamweb/CodeIgniter-Multi-Captcha/issues) اقدام به ثبت موضوع کنید ما قطعا پاسخگوی شما خواهیم بود.
در صورتی که برنامه نویس هستید لطفا برای بهتر شدن نسبت به مشارکت در کد نویسی از طریق [توسعه پکیج](https://github.com/datamweb/CodeIgniter-Multi-Captcha/pulls) اقدام کنید. ما برای بهتر شدن به تک تک شما نیازمندیم.

# حمایت مالی
نقطه آغازپروژه های منبع باز و دلیل ایجاد انها معمولا نیاز،علاقه و عشق توسعه دهنده به پروژه است. معمولا انتظار درآمدی خاص از آنها وجود ندارد. حقیقت این است که با توجه به پروژه مورد نظر ممکن است ساعت ها،روزها و شاید هم سالها زمان سپری شود تا سر آخر پروژه مورد نظر به مطلوبیت عام برسد و یا شکست بخورد، آنچه در اینجا مهم است زمان و تخصصی است که توسط توسعه دهندگان آنها بدون چشم داشت مالی صرف شده است . در کشور عزیزمان ایران این موضوع باب نشده است که نسبت به پرداخت هزینه استفاده از نرم افزارها،اپلیکیشنها و ... اقدام کنیم،با این حال در صورتی که تمایل به حمایت مالی داشته باشید میتوانید از لینک زیر نسبت به پرداخت وجه به صورت آنلاین اقدام کنید.پیشاپیش از شما ممنونم.
[حمایت مالی از طریق پی](https://me.pay.ir/datamweb)

[حمایت مالی از طریق زرین پال](https://zarinp.al/datamweb)







