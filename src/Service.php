<?php
 /*
        This code is under MIT License
        
        +--------------------------------+
        |   DO NOT MODIFY THIS HEADERS   |
        +--------------------------------+-----------------+
        |   Created by BiuStudio                           |
        |   Email: support@biuhub.net                      |
        |   Link: https://www.biurad.tk                    |
        |   Source: https://github.com/biustudios/biurad   |
        |   Real Name: Divine Niiquaye - Ghana             |
        |   Copyright Copyright (c) 2018-2019 BiuStudio    |
        |   License: https://biurad.tk/LICENSE.md          |
        +--------------------------------------------------+
        
        +--------------------------------------------------------------------------------+
        |   Version: 0.0.1.1, Relased at 18/02/2019 13:13 (GMT + 1.00)                       |
        +--------------------------------------------------------------------------------+
        
        +----------------+
        |   Tested on    |
        +----------------+-----+
        |  APACHE => 2.0.55    |
        |     PHP => 5.4       |
        +----------------------+
        
        +---------------------+
        |  How to report bug  |
        +---------------------+-----------------------------------------------------------------+
        |   You can e-mail me using the email addres written above. That email is also my msn   |
        |   contact, so you can use it for contact me on MSN.                                   |
        +---------------------------------------------------------------------------------------+
        
        +-----------+
        |  Notes    |
        +-----------+------------------------------------------------------------------------------------------------+
        |   - BiuRad's simple-as-possible architecture was inspired by several conference talks, slides              |
        |     and articles about php frameworks that - surprisingly and intentionally -                              |
        |     go back to the basics of programming, using procedural programming, static classes,                    |
        |     extremely simple constructs, not-totally-DRY code etc. while keeping the code extremely readable.      |
        |   - Features of Biuraad Php Framework
        |     +--> Proper security features, like CSRF blocking (via form tokens), encryption of cookie contents etc.|
        |     +--> Built with the official PHP password hashing functions, fitting the most modern password          |
                   hashing/salting web standards.                                                                    |
        |     +--> Uses [Post-Redirect-Get pattern](https://en.wikipedia.org/wiki/Post/Redirect/Get)                 |
        |     <--+ Uses URL rewriting ("beautiful URLs").                                                            |
        |   - Masses of comments                                                                                     |                                                                              |
        |     +--> Uses Libraries including Composer to load external dependencies.                                  |
        |     <--+ Proper security features, like CSRF blocking (via form tokens), encryption of cookie contents etc.|
        |   - Fits PSR-0/1/2/4 coding guideline.                                                                     |
        +------------------------------------------------------------------------------------------------------------+
        
        +------------------+
        |  Special Thanks  |
        +------------------+-----------------------------------------------------------------------------------------+
        |  I always thank the HTML FORUM COMMUNITY (http://www.html.it) for the advice about the regular expressions |
        |  A special thanks at github.com(http://www.github.com), because they provide me the list of php libraries, |
        |  snippets, and any more...                                                                                 |
        |  I thanks Php.net and Sololearn.com for its guildline in PHP Programming                                   |
        |  Finally, i thank Wikipedia for the countries's icons 20px                                                 |
        +------------------------------------------------------------------------------------------------------------+
*/
namespace Radion;

/**
 * Class Service Manager
 * Service is where all the applications written by user resides, for both
 * input and output processing.
 *
 *
 */
class ServiceManager
{
    /**
     * Contains the object of instantiation of the Service class.
     *
     * @static
     *
     * @var object
     *
     */
    private static $serviceObject;

    /**
     * @var array
     */
    private $config = '';

    /**
     * @static
     *
     * @return ServiceManager|object
     *
     */
    public static function loadServices()
    {
        if (isset(self::$serviceObject) === false) {
            self::$serviceObject = new self();
        }

        self::$serviceObject->prepare();

        return self::$serviceObject;
    }

    /**
     * Object preparer.
     *
     */
    private function prepare()
    {
        if (isset($config) === false) {
            $this->config = ConfigManager::_get('services');
        }

        foreach ($this->config as $className => $varName) {
            $this->$varName = new $className();
        }
    }
}


/**
 * Class ServiceContainer.
 *
 */
class ServiceContainer
{
    /**
     * @return ServiceContainer|object
     *
     */
    public function getThis()
    {
        return $this;
    }

    /**
     * 
     */
    public function dumpThis()
    {
        dd($this);
    }
}