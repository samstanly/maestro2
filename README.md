#Framework Maestro v2

###Usando Maestro:

1 - Git clone

2 - Composer install

3 - Acessar app, por exemplo ```http://localhost/maestro2/index.php/exemplos/main```


###Para usar JTrace:

1 - Alterar core/conf/conf.php

```
'log',
    'level' => 2, // 0 (nenhum), 1 (apenas erros) ou 2 (erros e SQL)
    'handler' => "socket",
		'peer' => [Development machine IP],
    'strict' => '',
    'port' => [Jtrace port]
),
```

2 - Na pasta root do maestro, executar
```git update-index --assume-unchanged core/conf/conf.php ```
Para evitar commits acidentais do conf.

3 - Executar JTrace em ```core/support/jtrace/JTrace.jar```

