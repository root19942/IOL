<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ' Le :attribute doit être accepté .',
    'active_url' => 'Le :attribute n\'est pas une URL valide.',
    'after' => 'Le :attribute doit être une date après :date.',
    'after_or_equal' => 'Le :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Le :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Le :attribute doit être un tableau.',
    'before' => 'Le :attribute doit être une date antérieure :date.',
    'before_or_equal' => 'Le :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le :attribute Doit être entre :min et :max.',
        'file' => 'Le :attribute Doit être entre :min et :max kilo-octets.',
        'string' => 'Le :attribute Doit être entre :min et :max caractères.',
        'array' => 'Le :attribute doit avoir entre :min et :max articles.',
    ],
    'boolean' => 'Le :attribute le champ doit être vrai ou faux.',
    'confirmed' => 'Le :attribute la confirmation ne correspond pas.',
    'date' => 'Le :attribute Ce n\'est pas une date valide.',
    'date_equals' => 'Le :attribute doit être une date égale à :date.',
    'date_format' => 'Le :attribute ne correspond pas au format :format.',
    'different' => 'Le :attribute et :other doivent être différent.',
    'digits' => 'Le :attribute doit être :digits chiffres.',
    'digits_between' => 'Le :attribute Doit être entre :min et :max chiffres.',
    'dimensions' => 'Le :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le :attribute le champ a une valeur en double.',
    'email' => 'Le :attribute doit être valide email adresse.',
    'ends_with' => 'Le :attribute doit se terminer par l\'un des éléments suivants: :values',
    'exists' => 'L\' :attribute selectioné est valide.',
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le :attribute le champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le :attribute doit être supérieur à :value.',
        'file' => 'Le :attribute doit être supérieur à :value kilo-octets.',
        'string' => 'Le :attribute doit être supérieur à :value caractères.',
        'array' => 'Le :attributedoit avoir plus de :value articles.',
    ],
    'gte' => [
        'numeric' => 'Le :attribute doit être supérieur ou égal :value.',
        'file' => 'Le :attribute doit être supérieur ou égal :value kilo-octets.',
        'string' => 'Le :attribute doit être supérieur ou égal :value caractères.',
        'array' => 'Le :attribute doit avoir :value articles ou plus.',
    ],
    'image' => 'Le :attribute doit être une image.',
    'in' => 'Le :attribute selectionné est invalide.',
    'in_array' => 'Le :attribute champ n\'existe pas dans :other.',
    'integer' => 'Le :attribute Doit être un entier.',
    'ip' => 'Le :attribute doit être valide IP adresse.',
    'ipv4' => 'Le :attribute doit être valide IPv4 adresse.',
    'ipv6' => 'Le :attribute doit être valide IPv6 adresse.',
    'json' => 'Le :attribute doit être valide JSON string.',
    'lt' => [
        'numeric' => 'Le :attribute doit être inférieur à :value.',
        'file' => 'Le :attribute doit être inférieur à :value kilo-octets.',
        'string' => 'Le :attribute doit être inférieur à :value caractères.',
        'array' => 'Le :attribute must avoir moins de :value articles.',
    ],
    'lte' => [
        'numeric' => 'Le :attribute doit être inférieur ou égal :value.',
        'file' => 'Le :attribute doit être inférieur ou égal :value kilo-octets.',
        'string' => 'Le :attribute doit être inférieur ou égal :value caractères.',
        'array' => 'Le :attributene doit pas avoir plus de :value articles.',
    ],
    'max' => [
        'numeric' => 'Le :attribute ne peut pas être supérieur à :max.',
        'file' => 'Le :attribute ne peut pas être supérieur à :max kilo-octets.',
        'string' => 'Le :attribute ne peut pas être supérieur à :max caractères.',
        'array' => 'Le :attribute ne peut pas avoir plus de :max articles.',
    ],
    'mimes' => 'Le :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le :attributedoit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le :attribute doit être au moins :min.',
        'file' => 'Le :attribute doit être au moins :min kilo-octets.',
        'string' => 'Le :attribute doit être au moins :min caractères.',
        'array' => 'Le :attribute doit avoir au moins :min articles.',
    ],
    'not_in' => 'The selected :attribute est invalide.',
    'not_regex' => 'Le :attribute le format n\'est pas valide.',
    'numeric' => 'Le :attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le :attribute le champ doit être présent.',
    'regex' => 'Le :attribute le format n\'est pas valide.',
    'required' => 'Le :attribute Champ requis.',
    'required_if' => 'Le :attribute est obligatoire lorsque :other est :value.',
    'required_unless' => 'Le :attribute Champ requis sauf si :other est en :values.',
    'required_with' => 'Le :attribute est obligatoire lorsque :values est présent.',
    'required_with_all' => 'Le :attribute est obligatoire lorsque :values sont présents.',
    'required_without' => 'Le :attribute est obligatoire lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le :attribute est obligatoire lorsqu\'aucune des :values sont présents.',
    'same' => 'Le :attribute et :other doit correspondre.',
    'size' => [
        'numeric' => 'Le :attribute must be :size.',
        'file' => 'Le :attribute doit contenir :size kilo-octets.',
        'string' => 'Le :attribute doit contenir :size caractere.',
        'array' => 'Le :attribute doit contenir :size articles.',
    ],
    'starts_with' => 'Le :attribute doit commencer par l\'un des éléments suivants: :values',
    'string' => 'Le :attribute doit être une chaîne.',
    'timezone' => 'Le :attribute doit être une zone valide.',
    'unique' => 'Le :attribute a déjà été pris.',
    'uploaded' => 'Le :attribute échec du téléchargement.',
    'url' => 'Le :attribute le format n\'est pas valide.',
    'uuid' => 'Le :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail adresse" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
