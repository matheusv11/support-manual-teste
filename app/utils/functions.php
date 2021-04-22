<?php



/**
 * Função responsável por renderizar as views (app/views)
 * 
 * @param string $viewName | Nome da view a ser renderizada
 * @param null|array $data | Dados para renderização
 * @param null|array $config | Configurações para alterar padrões da view
 * @return void
*/

function view(string $viewName, ?array $data = [], ?array $config = null): void
{
    if(!file_exists(__DIR__ . "\\..\\views\\{$viewName}.php"))
    {
        throw new Exception("Arquivo não existente");
    }
    
    if ($data)
    {
        extract($data);
    }    
    require __DIR__ . "\\..\\views\\template\\header.php";
    require __DIR__ . "\\..\\views\\{$viewName}.php";
    require __DIR__ . "\\..\\views\\template\\footer.php";
}
function rawView(string $viewName, ?array $data = [], ?array $config = null): void
{
    if(!file_exists(__DIR__ . "\\..\\views\\{$viewName}.php"))
    {
        throw new Exception("Arquivo não existente");
    }
    
    if ($data)
    {
        extract($data);
    }
    require __DIR__ . "\\..\\views\\{$viewName}.php";
}