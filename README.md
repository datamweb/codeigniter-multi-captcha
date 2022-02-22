[Farsi](./README.fa-IR.md) | English
# CI Multi Captcha(CIMC)
This package can be used for Codigniter Framework version 4 and above. This package supports three captcha services, including Arcaptcha service (professional captcha service, including image guessing, puzzles, etc. made in Iran), Bibot (puzzle captcha service made in Iran) and Recaptcha (made by Google). The user of this package can specify which captcha to use or specify that a captcha be selected at random.

![Demo CIMC](./image/demo_cimc-en-US.gif)
# Installation video tutorial
Here are tutorials on setting up, installing and how to use this package properly. For information on how to use this package correctly, please watch the uploaded videos. 
[tutorials videos in Youtube](https://www.youtube.com/playlist?list=PLOEdZeL7OZ3wudP8ajlXZD_1Lf_qv6pAb)

# How to install on the Codigniter framework

First, [download](https://github.com/datamweb/CodeIgniter-Multi-Captcha/releases) the latest version of the package. Then extract the downloaded zip file in the ```app/ThirdParty``` path. Now go to ```app/Config``` . Add the following to the ```Autoload.php``` file and save the file.
```
    public $psr4 = [
	//Add this line
        'CIMC' 	        => APPPATH . 'ThirdParty\CIMultiCaptcha',
    ];
    
```
In the next step, go to the ```app/Config``` path and add the following values in the ```Validation.php``` file.

```
    public $ruleSets = [
        // Add this line
        '\CIMC\Validation\RulesCIMC',
    ];
    public $templates = [
        // Add this line
        'CIMC_ERRORS_LIST'      => 'CIMC\Validation\Views\_list.php',
        // Add this line
        'CIMC_ERRORS_SINGLE'    => 'CIMC\Validation\Views\_single.php',
    ];
    
```
# Package configuration file
Before using this package, you need to receive two dedicated keys from each of the Captcha servers. In order to receive the keys, you must register in each of the Captcha servers and receive the keys. for receive Arcaptcha service keys to [Arcaptcha registration address](https://arcaptcha.ir/sign-up) , for receive Bibot keys to [Bibot registration address](https://bibot.ir/panel/user/signup/) and for receive recaptcha keys to [Recaptcha registration address](https://www.google.com/recaptcha/admin/create) . Get the keys to act. Then go to a ```app/ThirdParty/CIMultiCaptcha/Config``` and replace the relevant ```site_key``` and ```secret_key``` keys in the ```MultiCaptchaCIConfig.php``` file. If you need to change the color, theme, size and... proceed through this file. In the case of the captcha language, the package defaults to any language set in the CI framework and displays the captcha in the same language. If you need to customize the captcha language, set the ```lang``` values ​​through this file. Important point in this regard, the two Iranian servers (Arcaptcha and Bibot) support only two languages ​​Persian (fa) and English (en), this restriction is related to captcha servers and not the package.
# How to use (CIMC)
In general, how to use this package will be in two ways. The first method is to select the service by the programmer, for example, the programmer intends to use only the recaptcha service, so he must follow the green path according to the diagram below. The next item is the programmer has no role in specifying the service. The system randomly selects one of the services, to do this you have to follow the black path.
```mermaid
  flowchart LR;
      A[CI MULTI CHAPTCHA]-->B{Select captcha service by developer?};
      classDef green color:#022e1f,fill:#00f500;
      classDef red color:#022e1f,fill:#f11111;
      classDef white color:#022e1f,fill:#fff;
      classDef black color:#fff,fill:#000;
      B--YES-->C[How to use?]:::green;
      
      C-->U[I choose recaptcha.]:::green;
      U--Views-->Q["echo CIMC_JS('recaptcha');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'recaptcha']);"]:::green;
      U--Controller-->W["CIMC_FIELD('recaptcha) => CIMC_RULE(),"]:::green;
      
      C-->I[I choose arcaptcha.]:::white;
      I--Views-->O["echo CIMC_JS('arcaptcha');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'arcaptcha']);"]:::white;
      I--Controller-->P["CIMC_FIELD('arcaptcha) => CIMC_RULE(),"]:::white;
      
      C-->X[I choose bibot.]:::red;
      X--Views-->V["echo CIMC_JS('bibot');\n echo CIMC_ERROR(); \n echo CIMC_HTML(['captcha_name'=>'bibot']);"]:::red;
      X--Controller-->N["CIMC_FIELD('bibot) => CIMC_RULE(),"]:::red;
      
      B--NO-->D[How to use?]:::black;
      D---Views:::black-->F["echo CIMC_JS('randomcaptcha');\n echo CIMC_ERROR();\n echo CIMC_HTML(['captcha_name'=>'randomcaptcha']);"]:::black; 
      D---Controller:::black-->T["CIMC_FIELD('archaptcha,recaptcha,bibot') => CIMC_RULE(),"]:::black; 
```
# To improve
This package is provided as an open source. If you need to talk, come up with an idea, etc. via [discussions](https://github.com/datamweb/CodeIgniter-Multi-Captcha/discussions) Also, if there is a bug, please register via [issues](https://github.com/datamweb/CodeIgniter-Multi-Captcha/issues) .
If you are a programmer, please try to better participate in coding through [pulls](https://github.com/datamweb/CodeIgniter-Multi-Captcha/pulls) . We need each and every one of you to improve.