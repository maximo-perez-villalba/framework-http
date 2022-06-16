<?php
use demo\functional\App;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

$request = HTTPRequestsRoutes::currentHTTPRequest();
$response = $request->response();

/**
 * 
 * @var string $itemParametersBody
 */
$itemParametersBody = function(): string
{
    $code = '';
    foreach ( $_REQUEST as $name=>$value )
    {
        $code .= "<tr><th>{$name}</th><td>{$value}</td></tr>";
    }
    return <<<IBCONTENT
<table class="table table-secondary table-sm table-borderless table-inputs">
    {$code}
</table>
IBCONTENT;    
};

$requestPath = ( new ReflectionClass( $request ) )->getFileName();
$responsePath = ( new ReflectionClass( $response ) )->getFileName();

?>
<br>
<h4>Detalles del proceso de ejecución</h4>
<h6><strong>/<?= App::urnCurrent() ?></strong> => <?= get_class( $request ) ?></h6>
<hr>
<div class="accordion accordion-flush" id="processListItems">
<?php 
    print blockAccordionItemStatic( itemTitle( 'URL Base', App::urlBase() ) );
    print blockAccordionItemStatic( itemTitle( 'URI', $_SERVER[ 'REQUEST_URI' ] ) );
    print blockAccordionItem( itemTitle( 'Server script', '/.htaccess' ), show_source( Env::path( '/.htaccess' ), TRUE ) );
    print blockAccordionItem( itemTitle( 'Parameters', count( $_REQUEST ) ), $itemParametersBody() );
    print blockAccordionItem( itemTitle( 'Start the process', $_SERVER[ 'SCRIPT_NAME' ] ) , show_source( Env::path( '/index.php' ), TRUE ));
    print blockAccordionItem( itemTitle( 'Request', get_class( $request ) ), show_source( $requestPath, TRUE ) );
    print blockAccordionItem( itemTitle( 'Response', get_class( $response ) ), show_source( $responsePath, TRUE ) );
    print blockAccordionItem( itemTitle( 'View', $response->pathTemplate() ), show_source( App::pathView( $response->pathTemplate() ), TRUE ) );
?>
</div>
