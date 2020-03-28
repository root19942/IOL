<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

/*
        Les titres
*/



    'accueil' => 'Home',
    'rencontre' => 'Profiles',
    'evenement' => 'Events',
    'histoires' => 'Stories',
    'contact' => 'Contact Us',
    'connexion' => 'Sign in',
    'inscription' => 'Registration',
    'monprofil' => 'My profile',
    'deconnexion' => 'Disconnection',
    'logme' => 'register',
    'cgv' => 'General Conditions of Use',

/*
        Les texts du slide
*/

    'slide1' => 'Welcome to IOL; where beautiful people meet worldwide.',
    'slide2' => 'On IoL, your dreams turn to a love story.',
    'slide3' => 'The best profiles on the planet',
    'slide4' => 'A little look, a little smile, on IoL and your life will be transformed.',
    'slide5' => 'When LOVE talks to lovers.',
    'slide6' => 'You will find a soulmate on IoL.',
    'slide7' => 'IoL protects your privacy and integrity',
    'slide8' => 'IoL: where love matches with joy',


/*
    favories
*/

    'myfavor' => 'My Favorites',
    'nofavor' => 'You have no favorites yet',
    'Favori' => 'Favorite',
/*
    profil
*/

    'viewprofil' => 'Discover the profiles',
    'surnom' => 'Nickname',
    'nom' => 'Name',
    'enfant' => 'Child',
    'profession' => 'Profession',
    'email' => 'E-mail',
    'prenom' => 'First Names',
    'pays' => 'Country',
    'ville' => 'City',
    'phone' => 'Phone',
    'about' => 'About',
    'interets' => 'His Interests',
    'herinteret' => 'The Interests of',
/*
    evenement
*/

    'event' => 'Events',
    'eventDescription' => 'Follow us and participate in various events.',

    
    'couples' => 'Our Couples',
    'coupleDescription' => 'They trusted us.',
    'profession' => 'Profession',
    'email' => 'E-mail',
    'prenom' => 'First Names',
    'pays' => 'Country',
    'ville' => 'City',
    'phone' => 'Phone',
    'about' => 'About',
    'interets' => 'His Interests',
    'herinteret' => 'The Interests of',


    /*Rencontre
    */


    'seeprofile' => 'Discover the profiles',
    'noscouple' => 'Our Couples',
    'nationAll' => 'Any nationality',





    'hiw' => 'How to meet love on Island Of Love',
    'step1' => 'Step 1',
    'step1Def' => 'Click on Registration and fill in all the fields indicated',
    'step2' => 'Step 2',
    'step2Title' => 'find love',
    'step2Def' => 'Visit the profiles of other users and don\'t hesitate to give them a grain if they interest you.',
    'step3' => 'Step 3',
    'step3Title' => 'Find love',
    'step3Def' => 'Add as a favorite the profiles that interest you.',
    'step4' => 'Step 4',
    'step4Tile' => 'Engage yourself',
    'step4Def' => 'Chat with and learn about people and acquaintances.',

    
    'meetPage' => [
        'titre' => 'Find love',        
        'recherche' =>[
            'titre'=>'Improve research',
            'genre' =>[
                'titre'=>'I\'m looking for a',
                'option'=>[
                    'All',
                    'Other',
                    'Man',
                    'Woman',
                ]        
                ],
            'age'=> [
                'titre'=>'Old',
                'option'=>[
                    'All ages',
                    '-30 years',
                    '-50 years',
                    '-80 years'
                ],
            ],
            'nationalite'=>'Nationality',
            'appliquer'=>'Apply'
        ],
        'tchat' => [
            'titre'=>'chat',
            'sousTitre'=>'Chat with',        
            'genre' => 'Gender',
            'pays' => 'Country',
            'compatibilite' =>'Compatibility', 
            'annuler'=>'Cancel',
            'tchater'=>'chat',
        ],       
        'favori' => 'Favorite',
        'profile' => 'Profile',
    ],
    'eventPage' =>[
        'titre'=>'Events',
        'soustitre'=>'Follow us and participate in various events.',
        'cards'=>[
            [
                'titre'=>'January 5, 2020 Marriage proposal',
                'resume'=>'Julien proposed to Mary in the presence of family and friends.Thanks to island of loves',                
            ],
            [
                'titre'=>'January 17, 2020 Marriage',
                'resume'=>'Simone and Alexandre said  I do at the city hall of Douala 1 st. Few months ago, they were strangers and now they became husband and wife.',                
            ],
            [
                'titre'=>'February 14, 2020 Speed ​​Dating',
                'resume'=>'Speed dating.  Single men and women come and mingle with island of love and you will find your significant other.',                
            ],            
        ],
        'voirPlus'=>'See More'
    ],
    'storiePage' =>[
        'titre'=>'Our Couples',
        'soustitre'=>'They trusted us.',
    ],
    'contactPage'=>[
        'titre' =>'Contact Us',
        'soustitre'=>'Let us know about your concerns.',
        'champ'=>[
            'nom'=>'Your name and first name',
            'email'=>'Your email address',
            'sujetmessage'=>'Message subject',
            'message'=>'Your message',
            'envoye'=>'Send',
        ]
    ],
    'profilDetailPage'=>[
        'photo'=>'See the pictures',
        'apropos'=>[
            'titre' =>'About',
            'surnom'=>'NICKNAME:',
            'nom'=>'LAST NAME:',
            'prenom'=>'FIRST NAME:',
            'telephone'=>'PHONE:',
            'enfant'=>'CHILDREN:',
            'email'=>'E-MAIL:',
            'pays'=>'COUNTRY:',
            'ville'=>'TOWN:',
            'profession'=>'PROFESSION:'
        ],
        'interet'=>[
            'titre'=>'His Interests',
            'soustitre'=>'The Interests of',
        ],
    ],
    'profilPage'=>[
        'photo'=>'Change',
        'apropos'=>[
            'titre'=>'About Me',
            'surnom'=>[
                'titre'=>'Nickname',
                'input'=>'Enter your nickname',
                'msg'=>'Please enter your nickname'
            ],
            'nom'=>[
                'titre'=>'Name',
                'input'=>'Enter your name',
                'msg'=>'Please enter your name'
            ],
            'prenom'=>[
                'titre'=>'First name',
                'input'=>'Enter your first name',
                'msg'=>'Please enter your first name'
            ],
            'telephone'=>[
                'titre'=>'Phone',
                'input'=>'Enter your phone',
                'msg'=>'Please enter your phone'
            ],
            'enfant'=>[
                'titre'=>'Child(ren)',                
                'msg'=>'Please enter your number of children'
            ],
            'email'=>[
                'titre'=>'E-mail',
                'input'=>'Enter your e-mail',
                'msg'=>'Please enter your email'
            ],
            'pays'=>[
                'titre'=>'Country',
                'input'=>'Enter your country',
                'msg'=>'Please enter your country'
            ],
            'ville'=>[
                'titre'=>'City',
                'input'=>'Enter your city',
                'msg'=>'Please enter your city'
            ],
            'profession'=>[
                'titre'=>'Profession',
                'input'=>'Enter your profession',
                'msg'=>'Please enter your profession'
            ],
            'motpasse'=>[
                'titre'=>'Password',
                'input'=>'Enter your password',
                'msg'=>'Please enter your password'
            ],
            'motpassrep'=>[
                'titre'=>'Repeat Password',
                'input'=>'Enter your password again',
                'msg'=>'Please enter your password again'
            ],
            'ancmotpass'=>[
                'msg'=>'Enter your current password to validate the modifications',
                'input'=>'Please enter your current password to validate the modifications',
            ],
            'appliquer'=>'Apply',
        ],
        'interet'=>[
            'titre'=>'My Interests',
            'soustitre'=>'My Interests',
            'biographie'=>'Biography',
            'appliquer'=>'Apply',
        ],    
        'autre'=>[
            'titre'=>'Other',
            'favori'=>'FAVORITE(S)',
            'message'=>[
                'titre'=>'MESSAGE(S)',
                'personne'=>' person(s)',
            ],
            'evenement'=>[
                'titre'=>'EVENT(S)',
                'message'=>'Not yet available',
            ]
        ]
    ],
    'chatPage'=>[
        'profile'=>'Profile',
        'favori'=>'Add to favorites',
        'bloquer'=>'Block',
        'statut'=>'Writing',
        'etat'=>'is online',
    ],

    'registration'=>[
        'identite'=>'Identity',
        'naissance'=>'Birth',
        'adresse'=>'Address',
        'autre'=>'Other',
        'compte'=>'Account',
        'secretdata'=>'your information will remain confidential',
        'alreadi'=>'Already have an account?',
        'gender'=>'Gender',
        'autre'=>'Other',
        'femme'=>'Women',
        'homm'=>'Man',
        'dob'=>'Date of Birth',
        'pob'=>'Place of birth',
        'newacount'=>'Create your account',
    ],
    'login'=>[
    	'title'=>'Login to your account',
    	'forgot'=>'Forgot your password',
    	'noaccount'=>'No account?',
        'connecte'=>'Login',
    ]









];
