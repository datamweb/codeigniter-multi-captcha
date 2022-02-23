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
 * @since           Version 1.0.1-pre-alpha
 * @datepublic      2022-02-23 | 1400/12/04
 * 
 */

// Custom Validation language File for CIMC
return [
    // Custom Validation language for ArCaptcha
    'ArCaptcha'=> [
        'errors' => [
            'unknown'                   =>  'The system detected you as a robot for some reason, try again.',
            'empty'                     =>  "Please check I'm not a robot(arcaptcha).",
            'unable_to_connect_api'     =>  'It is not possible to connect to Arcaptcha services at this time. The Internet may be down or Arcaptcha servers may be down. Try again in a few minutes.',
            'attack'                    =>  'Avoid manipulating Arcaptcha form(I am not a robot).',
            //ArCaptcha errors Api responses 
            //NOTE :: ArCaptcha has not provided any documentation regarding the error formats. I have sent a request for support. I will update if provided.
            'missing_content_type'      =>  'You must submit the Content-Type parameter equal to application / json in your requests. Your request is invalid because this parameter was not sent correctly.',
            'missing_challenge_id'      =>  'The Arcaptcha response parameter is missing.',
            'missing_site_key'          =>  'The Arcaptcha site key parameter is missing.',
            'missing_secret_key'        =>  'The Arcaptcha secret parameter is missing.',
            'missing_all_body_input'    =>  'All Arcaptcha parameters is missing.',
            'invalid_input_response'    =>  'The Arcaptcha response is no longer valid: either is too old or has been used previously.',
            // bug in arcaptcha site_key is required but if it is not correct, return {"success": true}.
            'invalid_site_key'          =>  'The Arcaptcha site key parameter is invalid or malformed.',
            'invalid_secret_key'        =>  'The Arcaptcha secret key parameter is invalid or malformed.',
            // I may have forgotten some things in the Manual Response Test from Web Service ArCaptcha(API)
            'unknownERRORS'             =>  'Unknown error!',
        ],
        // filde name for print $this->validation->setRule('arcaptcha-token', lang('MultiCaptchaCILang.ArCaptcha.arcaptcha-token'), 'required|arcaptcha');
        //if required use filde name set
        'arcaptcha-token'               => "I'm not a robot(arcaptcha)",
    ],    
    // Custom Validation language for BiBot
    'BiBot'=> [
        'errors' => [
            'unknown'                   =>  'The system detected you as a robot for some reason, try again.',
            'empty'                     =>  'Please click to verify(bibot).',
            'unable_to_connect_api'     =>  'It is not possible to connect to BiBOT services at this time. The Internet may be down or BiBOT servers may be down. Try again in a few minutes.',
            'attack'                    =>  'Avoid manipulating BiBOT form(I am not a robot).',
            // biBot errors Api responses
            "missing_input_secret"      => 'The bibot secret parameter is missing.',
            "invalid_input_secret"      => 'The bibot secret parameter is invalid or malformed.',
            "missing_input_response"    => 'The bibot response parameter is missing.',
            "invalid_input_response"    => 'The bibot response parameter is invalid or malformed.',
            "timeout_or_duplicate"      => 'The bibot response is no longer valid: either is too old or has been used previously.',
        ],
        // filde name for print $this->validation->setRule('bibot-response', lang('MultiCaptchaCILang.BiBot.bibot-response'), 'required|bibot');
        //if required use filde name set
        'bibot-response'                => "I'm not a robot(bibot)",
    ],
    // Custom Validation language for ReCaptcha
    'ReCaptcha'=> [
        'errors' => [
            'unknown'                   =>  'The system detected you as a robot for some reason, try again.',
            'empty'                     =>  "Please check I'm not a robot(ReCaptcha).",
            'unable_to_connect_api'     =>  'It is not possible to connect to ReCaptcha services at this time. The Internet may be down or ReCaptcha servers may be down. Try again in a few minutes.',
            'attack'                    =>  'Avoid manipulating ReCaptcha form(I am not a robot).',
            // googel errors Api responses
            'missing_input_secret'      =>  'The recaptcha secret parameter is missing.',
            'invalid_input_secret'      =>  'The recaptcha secret parameter is invalid or malformed.',
            'missing_input_response'    =>  'The recaptcha response parameter is missing.',
            'invalid_input_response'    =>  'The recaptcha response parameter is invalid or malformed.',
            'bad_request'               =>  'The recaptcha request is invalid or malformed.',
            'timeout_or_duplicate'      =>  'The recaptcha response is no longer valid: either is too old or has been used previously.',
        ],
        // filde name for print $this->validation->setRule('g-recaptcha-response', lang('MultiCaptchaCILang.ReCaptcha.g-recaptcha-response'), 'required|recaptcha');
        //if required use filde name set
        'g-recaptcha-response'          => "I'm not a robot(recaptcha)",
    ],
    // Custom Validation language for hCaptcha
    'hCaptcha'=> [
        'errors' => [
            'unknown'                               =>  'The system detected you as a robot for some reason, try again.',
            'empty'                                 =>  "Please check I'm human(hcaptcha).",
            'unable_to_connect_api'                 =>  'It is not possible to connect to hcaptcha services at this time. The Internet may be down or hcaptcha servers may be down. Try again in a few minutes.',
            'attack'                                =>  'Avoid manipulating ReCaptcha form(I am not a robot).',
            // hCaptcha errors Api responses
            'missing-input-secret'                  =>  'The hcaptcha secret parameter is missing.',
            'invalid_input_secret'                  =>  'The hcaptcha secret parameter is invalid or malformed.',
            'missing_input_response'                =>  'The hcaptcha response parameter is missing.',
            'invalid_input_response'                =>  'The hcaptcha response parameter is invalid or malformed.',
            'bad_request'                           =>  'The hcaptcha request is invalid or malformed.',
            'invalid_or_already_seen_response'      =>  'The response parameter has already been checked, or has another issue.',
            'not_using_dummy_passcode'              =>  'You have used a testing sitekey but have not used its matching secret.',
            'sitekey_secret_mismatch'               =>  'The sitekey is not registered with the provided secret.',
        ],
        // filde name for print $this->validation->setRule('h-captcha-response', lang('MultiCaptchaCILang.hCaptcha.h-captcha-response'), 'required|hcaptcha');
        //if required use filde name set
        'h-captcha-response'          => "I am human(hcaptcha)",
    ],

];