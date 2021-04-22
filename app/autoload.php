<?php



spl_autoload_register(
    /**
     * @param string $class
     * @return void
    */
    function (string $class): void
    {
        $baseDirectory = __DIR__ . '/';

        $vendorPrefix = 'App\\';

        $vendorLength = mb_strlen($vendorPrefix);

        /**
         * [ https://www.php.net/manual/pt_BR/function.strncmp.php ]
         * 
         * Comparação de string segura para binário para os primeiros n caracteres:
         * strncmp($str1, $str2, $tamanho)
         * 
         * Retorna um número MENOR que zero caso $str1 seja MENOR que $str2
         * Retorna um número MAIOR que zero caso $str1 seja MAIOR que $str2
         * Retorna ZERO caso $str1 e $str2 sejam IGUAIS
        */

        /*    classe instânciada | prefixo do fornecedor | tamanho do nome do fornecedor */
        if (strncmp($class, $vendorPrefix, $vendorLength) != 0) {

            /* Se não estiver sendo chamado uma classe do fornecedor definido na $vendorPrefix */
            return;
        }

        $cutPrefix = substr($class, $vendorLength); // remove o prefixo App\ da clase chamada

        $classFile = $baseDirectory . str_replace('\\', DIRECTORY_SEPARATOR, $cutPrefix) . '.php';

        if (file_exists($classFile) && is_file($classFile)) {

            require $classFile;
        }
    }
);