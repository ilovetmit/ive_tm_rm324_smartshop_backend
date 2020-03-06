<?php

return [
    'accepted'                       => ':attribute muss akzeptiert werden.',
    'active_url'                     => ':attribute ist keine gültige URL.',
    'after'                          => ':attribute muss ein Datum nach :date sein.',
    'after_or_equal'                 => ':attribute muss ein Datum nach oder gleich :date sein.',
    'alpha'                          => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash'                     => ':attribute darf nur Buchstaben, Ziffern und Striche enthalten.',
    'alpha_num'                      => ':attribute darf Buchstaben und Ziffern enthalten.',
    'latin'                          => 'The :attribute may only contain ISO basic Latin alphabet letters.',
    'array'                          => ':attribute muss ein Array sein.',
    'before'                         => ':attribute muss ein Datum vor :date sein.',
    'before_or_equal'                => ':attribute muss ein Datum vor oder gleich :date sein.',
    'between'                        => [
        'numeric' => ':attribute muss zwischen :min und :max liegen.',
        'file'    => ':attribute muss zwischen :min und :max KB liegen.',
        'string'  => ':attribute muss zwischen :min und :max Buchstaben enthalten.',
        'array'   => ':attribute muss zwischen :min und :max  Elemente enthalten.',
    ],
    'boolean'                        => ':attribute muss True oder False sein.',
    'confirmed'                      => 'Der Überprüfungswert für :attribute  stimmt nicht überein.',
    'date'                           => ':attribute ist kein gültiges Datum.',
    'date_format'                    => ':attribute entspricht nicht dem Format :format.',
    'different'                      => ':attribute und :other müssen unterschiedlich sein.',
    'digits'                         => ':attribute muss :digits Ziffern enthalten.',
    'digits_between'                 => ':attribute muss zwischen :min und :max Ziffern liegen.',
    'dimensions'                     => ':attribute hat die falschen Abmessungen.',
    'distinct'                       => ':attribute Wert ist bereits vorhanden.',
    'email'                          => ':attribute muss eine gültige E-Mail sein.',
    'exists'                         => ':attribute ist ungültig.',
    'file'                           => ':attribute muss eine Datei sein.',
    'filled'                         => ':attribute ist ein Pflichtfeld.',
    'gt'                             => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte'                            => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                          => ':attribute muss ein Bild sein.',
    'in'                             => ':attribute enthält eine ungültige Auswahl.',
    'in_array'                       => ':attribute existiert nicht in :other.',
    'integer'                        => ':attribute muss eine Zahl sein.',
    'ip'                             => ':attribute muss eine IP Adresse sein.',
    'ipv4'                           => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                           => 'The :attribute must be a valid IPv6 address.',
    'json'                           => ':attribute muss ein JSON Wert sein.',
    'lt'                             => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                            => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                            => [
        'numeric' => ':attribute darf nicht größer als :max sein',
        'file'    => ':attribute darf nicht größer als :max kilobyte sein.',
        'string'  => ':attribute darf nicht mehr als :max Zeichen lang sein.',
        'array'   => ':attribute darf nicht mehr als :max Einträge enthalten.',
    ],
    'mimes'                          => ':attribute muss vom Typ :values sein.',
    'mimetypes'                      => ':attribute muss vom Datei-Typ :values sein.',
    'min'                            => [
        'numeric' => ':attribute muss mindestens :min sein.',
        'file'    => ':attribute muss mindestens :min kilobytes sein.',
        'string'  => ':attribute muss mindestens :min Zeichen enthalten.',
        'array'   => ':attribute muss mindestens :min Einträge enthalten.',
    ],
    'not_in'                         => 'Die Auswahl :attribute ist ungültig.',
    'not_regex'                      => 'Das Format von :attribute ist ungültig.',
    'numeric'                        => ':attribute muss eine Zahl sein.',
    'password'                       => 'Das Kennwort ist nicht richtig.',
    'present'                        => ':attribute ist ein Pflichtfeld.',
    'regex'                          => ':attribute Format ist ungültig.',
    'required'                       => ':attribute ist ein Pflichtfeld.',
    'required_if'                    => ':attribute ist ein Pflichtfeld wenn :other ist :value.',
    'required_unless'                => ':attribute ist ein Pflichtfeld wenn :other ist nicht :value.',
    'required_with'                  => ':attribute ist ein Pflichtfeld wenn :values ausgewählt.',
    'required_with_all'              => ':attribute ist ein Pflichtfeld wenn :values ausgewählt.',
    'required_without'               => ':attribute ist ein Pflichtfeld wenn :values nicht ausgewählt.',
    'required_without_all'           => ':attribute ist ein Pflichtfeld wenn keines von :values ausgewählt.',
    'same'                           => ':attribute und :other müssen identisch sein.',
    'size'                           => [
        'numeric' => ':attribute muss :size sein.',
        'file'    => ':attribute muss :size kilobyte sein.',
        'string'  => ':attribute muss :size Zeichen enthalten.',
        'array'   => ':attribute muss :size Einträge enthalten.',
    ],
    'string'                         => ':attribute muss eine Zeichenfolge sein.',
    'timezone'                       => ':attribute muss eine gültige Zone sein.',
    'unique'                         => ':attribute ist bereits in Verwendung.',
    'uploaded'                       => ':attribute konnte nicht Hochgeladen werden.',
    'url'                            => ':attribute Format ist ungültig.',
    'custom'                         => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => ':attribute enthält ungültige Wörter.',
    'dont_allow_first_letter_number' => 'Das \":input\"-Feld darf keine Zahl als Anfangsbuchstaben haben',
    'exceeds_maximum_number'         => 'The :attribute exceeds maximum model length',
    'attributes'                     => [],
];