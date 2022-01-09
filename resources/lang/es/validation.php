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

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL vÃ¡lida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El campo :attribute solo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute solo puede contener letras, nÃºmeros, guiones y guiones bajos.',
    'alpha_num'            => 'El campo :attribute solo puede contener letras y nÃºmeros.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmaciÃ³n de :attribute no coincide.',
    'date'                 => 'El campo :attribute no corresponde con una fecha vÃ¡lida.',
    'date_equals'          => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un nÃºmero de :digits dÃ­gitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dÃ­gitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones de imagen invÃ¡lidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute debe ser una direcciÃ³n de correo vÃ¡lida.',
    'ends_with'            => 'El campo :attribute debe finalizar con alguno de los siguientes valores: :values',
    'exists'               => 'El campo :attribute seleccionado no existe.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'gt'                   => [
        'numeric' => 'El campo :attribute debe ser mayor a :value.',
        'file'    => 'El archivo :attribute debe pesar mÃ¡s de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener mÃ¡s de :value caracteres.',
        'array'   => 'El campo :attribute debe contener mÃ¡s de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => 'El campo :attribute debe ser mayor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o mÃ¡s kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o mÃ¡s caracteres.',
        'array'   => 'El campo :attribute debe contener :value o mÃ¡s elementos.',
    ],
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute es invÃ¡lido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un nÃºmero entero.',
    'ip'                   => 'El campo :attribute debe ser una direcciÃ³n IP vÃ¡lida.',
    'ipv4'                 => 'El campo :attribute debe ser una direcciÃ³n IPv4 vÃ¡lida.',
    'ipv6'                 => 'El campo :attribute debe ser una direcciÃ³n IPv6 vÃ¡lida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON vÃ¡lida.',
    'lt'                   => [
        'numeric' => 'El campo :attribute debe ser menor a :value.',
        'file'    => 'El archivo :attribute debe pesar menos de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener menos de :value caracteres.',
        'array'   => 'El campo :attribute debe contener menos de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o menos kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o menos caracteres.',
        'array'   => 'El campo :attribute debe contener :value o menos elementos.',
    ],
    'max'                  => [
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
        'file'    => 'El archivo :attribute no debe pesar mÃ¡s de :max kilobytes.',
        'string'  => 'El campo :attribute no debe contener mÃ¡s de :max caracteres.',
        'array'   => 'El campo :attribute no debe contener mÃ¡s de :max elementos.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute debe contener al menos :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es invÃ¡lido.',
    'not_regex'            => 'El formato del campo :attribute es invÃ¡lido.',
    'numeric'              => 'El campo :attribute debe ser un nÃºmero.',
    'password'             => 'La contraseÃ±a es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es invÃ¡lido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values estÃ¡ presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values estÃ¡n presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no estÃ¡ presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values estÃ¡n presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El campo :attribute debe ser una zona horaria vÃ¡lida.',
    'unique'               => 'El valor del campo :attribute ya estÃ¡ en uso.',
    'uploaded'             => 'El campo :attribute no se pudo subir.',
    'url'                  => 'El formato del campo :attribute es invÃ¡lido.',
    'uuid'                 => 'El campo :attribute debe ser un UUID vÃ¡lido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'=>'nombre',
        'email'=>'correo electrÃ³nico',
        'file'=>'archivo',
        'password'=>'contraseÃ±a',
        'title'=>'tÃ­tulo',
        'code'=>'cÃ³digo',
        'period'=>'gestiÃ³n',
        'description'=>'descripciÃ³n',
        'document'=>'adjuntar',
        'datetime'=>'fecha',
         'dueDate'=>'fecha',
        'amount'=>'costo', 
        'percentage'=>'porcentaje',
        'type'=>'sociedad', 
        'phone'=>'telefono', 
        'short_name'=>'nombre corto', 
        'long_name'=>'nombre largo', 
        'phone'=>'telefono',    
        'address'=>'direcciÃ³n',
        'details'=>'asunto',
        'deliveries'=>'entregable',
        'group'=>'grupo',            
    ],

];
	