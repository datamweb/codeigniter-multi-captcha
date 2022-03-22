<?php
namespace Datamweb\CIMC\Validation;

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha(CIMC) Validation Rules (CustomRules) 
 * --------------------------------------------------------------------------
 *
 * @package         CodeIgniter-Multi-Captcha(CIMC)
 * @collection      Best Datamweb Tools CI4(BDT-CI4)
 * @author          Pooya Parsa Dadashi(@datamweb)
 * @link            https://datamweb.ir
 * @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
 * @since           Version 1.0.2-pre-alpha
 * @datepublic      2022-02-26 | 1400/12/07
 * 
 */

class RulesCIMC {

    //construct
    public function __construct(){
        $this->LibCIMC=service('MutiCaptchCI');
    }

    /**
     * Check for a valid ar_captcha  input form
     * @param string $challenge_id(token)
     * 
     */
    public function arcaptcha(?string $challenge_id = null,  string &$error = null): bool
    {
        // if user not answer
        if (empty($challenge_id)) {
            $error = lang('MultiCaptchaCILang.ArCaptcha.errors.empty');
            return (bool) false;
        }  
        //if user attack to arcaptcha-token input by Manually.(arcaptcha api return arcaptcha_token(length of the string is 30 and just number)).
        // https://regex101.com/library/qkssvF
        if (!preg_match('/^[0-9]{30}$/', $challenge_id)) {
             $error = lang('MultiCaptchaCILang.ArCaptcha.errors.attack');
            return (bool) false;
        }
       $Arcaptcha = $this->LibCIMC;
       $response=$Arcaptcha->verifyArCaptcha($challenge_id);      
        //if Unable to connect to the ArCaptcha web service(api url).
        if(!$response){
            $error = lang('MultiCaptchaCILang.ArCaptcha.errors.unable_to_connect_api');
            return (bool) false;
        }
        $Arcaptcha= json_decode($response);
       // if all ok 
       if(isset ($Arcaptcha->success) && $Arcaptcha->success ){
           return (bool) true;
       }
        // error is returned
        //NOTE :: ArCaptcha has not provided any documentation regarding the error formats. I have sent a request for support.But no answer was given.
        //I wrote an helper function for this problem. ::: THIS WAY IS NOT CORRECT ::: . But it is the only possible way to Customization error answers.        
         else{
        // for analysis Error Arcaptcha
        helper('cimc_arcaptcha');
        $answe=analysisErrorsArcaptcha($response);
            switch ($answe) {
                //The content_type header parameter is missing
                case "missing_content_type":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.missing_content_type');
                    return (bool) false;
                //The response parameter is missing
                case "missing_challenge_id":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.missing_challenge_id');
                    return (bool) false;
                //The secret parameter is missing
                case "missing_site_key":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.missing_site_key');
                    return (bool) false;
                //The secret key parameter is missing
                case "missing_secret_key":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.missing_secret_key');
                    return (bool) false;
                //The secret key parameter is missing
                case "missing_all_body_input":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.missing_all_body_input');
                    return (bool) false;
                //The response parameter is invalid or malformed.
                case "invalid_input_response":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.invalid_input_response');
                    return (bool) false;
                //The invalid site_key
                // bug in arcaptcha site_key is required but if it is not correct, return {"success": true}
                case "invalid_site_key":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.invalid_site_key');
                    return (bool) false;
                //The invalid secret_key 
                case "invalid_secret_key":
                    $error = lang('MultiCaptchaCILang.ArCaptcha.errors.invalid_secret_key');
                    return (bool) false;
             } 
        }
        $error = lang('MultiCaptchaCILang.ArCaptcha.errors.unknown');
        return (bool) false;
    }

    /**
     * Check for a valid bibot-response input form
     * @param string $bibot-response(token)
     * 
     */
    public function bibot(?string $bibot_response = null , string &$error = null): bool
    {
        // if user not answer
        if (empty($bibot_response)) {
            $error = lang('MultiCaptchaCILang.BiBot.errors.empty');
            return (bool) false;
        }
        // if user attack to bibot-response input by Manually (bibot api return bibot-response(=sha512)).
        //https://regex101.com/library/eFq5wR
        if (!preg_match('/[0-9a-fA-F]{512}$/', $bibot_response)) {
             $error = lang('MultiCaptchaCILang.BiBot.errors.attack');
            return (bool) false;
        }
        $Bibot = $this->LibCIMC;
        $Bibot=$Bibot->verifyBiBot($bibot_response);
        // if Unable to connect to the bibot web service(api url).
        if(!$Bibot){
            $error = lang('MultiCaptchaCILang.BiBot.errors.unable_to_connect_api');
            return (bool) false;
        }    
        //bibot did not work well. Because return "error-codes" his Should retern "error_codes"
        // for To replace - to _ in the api response.
        $Bibot = str_replace("-", "_", $Bibot);
        $Bibot= json_decode($Bibot);
        //Everything is OK // $Bibot->success = true
        if($Bibot->success){
            return (bool) true;
        }
        //If there is an error.(!$Bibot->success)
        else{
            switch ($Bibot->error_codes[0]) {
            //The secret parameter is missing
            case "missing_input_secret":
                $error = lang('MultiCaptchaCILang.BiBot.errors.missing_input_secret');
                return (bool) false;
            //The secret parameter is invalid or malformed.
            case "invalid_input_secret":
                $error = lang('MultiCaptchaCILang.BiBot.errors.invalid_input_secret');
                return (bool) false;
            //The response parameter is missing
            case "missing_input_response":
                $error = lang('MultiCaptchaCILang.BiBot.errors.missing_input_response');
                return (bool) false;
            //The response parameter is invalid or malformed.
            case "invalid_input_response":
                $error = lang('MultiCaptchaCILang.BiBot.errors.invalid_input_response');
                return (bool) false;
            //The response is no longer valid: either is too old or has been used previously.
            case "timeout_or_duplicate":
                $error = lang('MultiCaptchaCILang.BiBot.errors.timeout_or_duplicate');
                return (bool) false;
            }            
        }
        $error = lang('MultiCaptchaCILang.BiBot.errors.unknown');
        return (bool) false;
    }

    /**
     * Check for a valid g-recaptcha-response input form
     * @param string $g-recaptcha-response(token)
     * 
     */
    public function recaptcha(?string $recaptcha_token = null , string &$error = null): bool
    {
        // if user not answer
        if (empty($recaptcha_token)) {
            $error = lang('MultiCaptchaCILang.ReCaptcha.errors.empty');
            return (bool) false;
        }
        // if user attack to g-recaptcha-response input by Manually (googel recaptcha api return g-recaptcha-response(=462 and 484 string(4daddD-_))).
        //https://regex101.com/library/eFq5wR
        // if (!preg_match('/^[(0-9a-zA-Z-_)]{462,484}$/', $recaptcha_token)) {
        //      $error = lang('MultiCaptchaCILang.ReCaptcha.errors.attack');
        //      return (bool) false;
        //      var_dump($recaptcha_token);exit;
        // }
        $Recaptcha = $this->LibCIMC;
        $Recaptcha=$Recaptcha->verifyReCaptcha($recaptcha_token); 
        // if Unable to connect to the googel web service(api url).
        if(!$Recaptcha){
            $error = lang('MultiCaptchaCILang.ReCaptcha.errors.unable_to_connect_api');
            return (bool) false;
        }
        //googel did not work well. Because return "error-codes" his Should retern "error_codes"
        // for To replace - to _ in the api response.
        $Recaptcha = str_replace("-", "_", $Recaptcha);
        $Recaptcha= json_decode($Recaptcha);
        //Everything is OK // $Recaptcha->success = true
        if($Recaptcha->success){
            return (bool) true;
        }
        //If there is an error.(!$Recaptcha->success)
        else{
            switch ($Recaptcha->error_codes[0]) {
            //The secret parameter is missing
            case "missing_input_secret":
                $error = lang('MultiCaptchaCILang.ReCaptcha.errors.missing_input_secret');
                return (bool) false;
            //The secret parameter is invalid or malformed.
            case "invalid_input_secret":
                $error = lang('MultiCaptchaCILang.ReCaptcha.errors.invalid_input_secret');
                return (bool) false;
            //The response parameter is missing
            case "missing_input_response":
                $error = lang('MultiCaptchaCILang.ReCaptcha.errors.missing_input_response');
                return (bool) false;
            //The response parameter is invalid or malformed.
            case "invalid_input_response":
                $error = lang('MultiCaptchaCILang.ReCaptcha.errors.invalid_input_response');
                return (bool) false;
            //The request is invalid or malformed.
            case "bad_request":
                $error = lang('MultiCaptchaCILang.ReCaptcha.errors.bad_request');
                return (bool) false;
            //The response is no longer valid: either is too old or has been used previously.
            case "timeout_or_duplicate":
                $error = lang('MultiCaptchaCILang.ReCaptcha.errors.timeout_or_duplicate');
                return (bool) false;
            }
        }
        $error = lang('MultiCaptchaCILang.ReCaptcha.errors.unknown');
        return (bool) false;
    }

    /**
     * Check for a valid h_captcha_response input form
     * @param string $h_captcha_response(token)
     * 
     */
    public function hcaptcha(?string $h_captcha_response = null , string &$error = null): bool
    {
        // if user not answer
        if (empty($h_captcha_response)) {
            $error = lang('MultiCaptchaCILang.hCaptcha.errors.empty');
            return (bool) false;
        }
        $Hcaptcha = $this->LibCIMC;
        $Hcaptcha=$Hcaptcha->verifyHCaptcha($h_captcha_response); 
        // if Unable to connect to the hcaptcha web service(api url).
        if(!$Hcaptcha){
            $error = lang('MultiCaptchaCILang.hCaptcha.errors.unable_to_connect_api');
            return (bool) false;
        }
        //hcaptcha did not work well. Because return "error-codes" his Should retern "error_codes"
        // for To replace - to _ in the api response.
        $Hcaptcha = str_replace("-", "_", $Hcaptcha);
        $Hcaptcha= json_decode($Hcaptcha);
        //Everything is OK // $Hcaptcha->success = true
        if($Hcaptcha->success){
            return (bool) true;
        }
        //If there is an error.(!$Hcaptcha->success)
        else{
            switch ($Hcaptcha->error_codes[0]) {
            //The secret parameter is missing
            case "missing_input_secret":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.missing_input_secret');
                return (bool) false;
            //The secret parameter is invalid or malformed.
            case "invalid_input_secret":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.invalid_input_secret');
                return (bool) false;
            //The response parameter is missing
            case "missing_input_response":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.missing_input_response');
                return (bool) false;
            //The response parameter is invalid or malformed.
            case "invalid_input_response":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.invalid_input_response');
                return (bool) false;
            //The request is invalid or malformed.
            case "bad_request":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.bad_request');
                return (bool) false;
            //The response parameter has already been checked, or has another issue.
            case "invalid_or_already_seen_response":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.invalid_or_already_seen_response');
                return (bool) false;
            //You have used a testing sitekey but have not used its matching secret.
            case "not_using_dummy_passcode":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.not_using_dummy_passcode');
                return (bool) false;
            //The sitekey is not registered with the provided secret
            case "sitekey_secret_mismatch":
                $error = lang('MultiCaptchaCILang.hCaptcha.errors.sitekey_secret_mismatch');
                return (bool) false;
            }
        }
        $error = lang('MultiCaptchaCILang.hCaptcha.errors.unknown');
        return (bool) false;
    }

}
