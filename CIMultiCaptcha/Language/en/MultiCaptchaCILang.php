<?php
/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha language file (en)
 * --------------------------------------------------------------------------
 *
 * @package         CodeIgniter-Multi-Captcha(CIMC)
 * @collection	    Best Datamweb Tools CI4(BDT-CI4)
 * @author          Pooya Parsa Dadashi
 * @link            https://datamweb.ir
 * @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
 * @since           Version 1.0.0
 * @datepublic      2022-02-19 | 1400/11/30
 * 
 */

// Custom Validation language File for CIMC
return [
    // Custom Validation language for ArCaptcha
    'ArCaptcha'=> [
        'errors' => [
            'unknown'                   =>  'The system detected you as a robot for some reason, try again.',
            'empty'                     =>  'Please check I am not a robot.',
            'unable_to_connect_api'     =>  'It is not possible to connect to Arcaptcha services at this time. The Internet may be down or Arcaptcha servers may be down. Try again in a few minutes.',
            'attack'                    =>  'Avoid manipulating Arcaptcha form(I am not a robot).',
            //ArCaptcha errors Api responses 
            //NOTE :: ArCaptcha has not provided any documentation regarding the error formats. I have sent a request for support. I will update if provided.
            'missing_content_type'      =>  'شما باید پارامتر Content-Type را برابر application/json در درخواست های خود ارسال کنید.درخواست شما به این دلیل معتبر نیست که این پرامتر به درستی ارسال نشده است.',
            'missing_challenge_id'      =>  'ارسال پارامتر challenge_id الزامی است.در درخواست شما این پارامتر ارسال نشده است.',
            'missing_site_key'          =>  'پارامتر کلید سایت الزامی هست.در درخواست شما این مورد ارسال نشده است.',
            'missing_secret_key'        =>  'پارامتر Secret Key الزامی هست.لطفا پارامتر مربوطه را تنظیم کنید.',
            'missing_all_body_input'    =>  'هیچ یک از پارامتر های الزامی ارسال نشده است.',
            'invalid_input_response'    =>  'پاسخ ارسالی شما به آرکپچا اشتباه و یا قبلا منقضی شده است.',
            // bug in arcaptcha site_key is required but if it is not correct, return {"success": true}.
            'invalid_site_key'          =>  'پارامتر Site Key آرکپچا اشتباه است.لطفا از فایل کانفینگ نسبت به تنظیم ان اقدام کنید.',
            'invalid_secret_key'        =>  'پارامتر Secret Key تنظیم شده اشتبا است.لطفا از فایل کانفینگ نسبت به تنظیم صحیح این مقدار اقدام کنید.',
            // I may have forgotten some things in the Manual Response Test from Web Service ArCaptcha(API)
            'unknownERRORS'             =>  'خطای نا شناخته!',
        ],
        // filde name for print $this->validation->setRule('arcaptcha-token', lang('MultiCaptchaCILang.ArCaptcha.arcaptcha-token'), 'required|arcaptcha');
        //if required use filde name set
        'arcaptcha-token'               => 'من ربات نیستم آرکپچا',
    ],    
    // Custom Validation language for BiBot
    'BiBot'=> [
        'errors' => [
            'unknown'                   =>  'سیستم به دلایلی شما را ربات تشخیص داد،مجدد تلاش کنید.',
            'empty'                     =>  'لطفا بر روی "تایید هویت کلیک کنید".',
            'unable_to_connect_api'     =>  'در این دقایق امکان برقرای ارتباط با سرویس های بی بات وجود ندارد.ممکن است اینترنت اختلال و یا سرورهای بی بات از دسترس خارج شده باشند.دقایقی بعد مجدد تلاش کنید.',
            'attack'                    =>  'از دستکاری فرم من ربات نیستم بی بات پرهیز کنید.',
            // biBot errors Api responses
            "missing_input_secret"      => 'پارامتر کلید مخفی سایت شما فراموش شده است',
            "invalid_input_secret"      => 'پارامتر کلید مخفی سایت شما اشتباه است',
            "missing_input_response"    => 'پارامتر ریسپانس شما فراموش شده است',
            "invalid_input_response"    => 'پارامتر ریسپانس شما اشتباه است',
            "timeout_or_duplicate"      => 'پارامتر ریسپانس منقضی شده است',
        ],
        // filde name for print $this->validation->setRule('bibot-response', lang('MultiCaptchaCILang.BiBot.bibot-response'), 'required|bibot');
        //if required use filde name set
        'bibot-response'                => 'من ربات نیستم بی بات',
    ],
    // Custom Validation language for ReCaptcha
    'ReCaptcha'=> [
        'errors' => [
            'unknown'                   => 'سیستم به دلایلی شما را ربات تشخیص داد،مجدد تلاش کنید.',
            'empty'                     => 'لطفا،تیک من ربات نیستم ریکپچا را بزنید.',
            'unable_to_connect_api'     => 'در این دقایق امکان برقرای ارتباط با سرویس گوگل وجود ندارد.ممکن است اینترنت اختلال و یا سرورهای گوگل از دسترس خارج باشند.',
            'attack'                    => 'از دستکاری فرم من ربات نیستم پرهیز کنید.',
            // googel errors Api responses
            'missing_input_secret'      =>  'پارامتر کلید خصوصی به وب سرویس گوگل ارسال نشده است،لطفا از دستکاری فایلهای اصلی اجتناب کنید.واز فایل اصلی کتابخانه استفاده کنید.',
            'invalid_input_secret'      =>  'کلید خصوصی گوگل اشتباه می باشد.از فایل کانفینگ کلید خصوصی گوگل را تنظیم کنید.',
            'missing_input_response'    =>  'پارامتر پاسخ کاربر به وب سرویس گوگل ارسال نشده است،لطفا از دستکاری فایلهای اصلی اجتناب کنید.واز فایل اصلی کتابخانه استفاده کنید.',
            'invalid_input_response'    =>  'پاسخ شما اشتباه تشخیص داده شد',
            'bad_request'               =>  'درخواست نا معتبر!',
            'timeout_or_duplicate'      =>  'از زمان ارسال پاسخ، زمان زیادی گذشته و یا پاسخ قبلا استفاده شده است!',
        ],
        // filde name for print $this->validation->setRule('g-recaptcha-response', lang('MultiCaptchaCILang.ReCaptcha.g-recaptcha-response'), 'required|recaptcha');
        //if required use filde name set
        'g-recaptcha-response'          => 'من ربات نیستم گوگل',
    ],

];