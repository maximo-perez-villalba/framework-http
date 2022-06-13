<?php
use demo\functional\App;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequest;
$request = HTTPRequest::current();
$response = HTTPRequest::current()->response();

/**
 * @param string $title
 * @param string $body
 * @return string
 */
function blockAccordionItem( string $title, string $body, bool $open = FALSE ): string
{
    $itemId = md5( $title.$body );
    $showBody = $open ? 'show': '';
    $toogleStateHeader = $open ? '': 'collapsed';
    return <<<AITEM
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-{$itemId}">
          <button class="accordion-button {$toogleStateHeader}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{$itemId}" aria-expanded="true" aria-controls="collapse-{$itemId}">
            {$title}
          </button>
        </h2>
    	<div id="collapse-{$itemId}" class="accordion-collapse collapse $showBody" aria-labelledby="heading-{$itemId}" data-bs-parent="#processListItems">
          <div class="accordion-body">
            {$body}
          </div>
        </div>
    </div>
AITEM;    
}

/**
 * 
 * @param string $title
 * @param string $body
 * @param bool $open
 * @return string
 */
function blockAccordionItemStatic( string $title ): string
{
    $itemId = md5( $title );
    return <<<AITEM
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-{$itemId}">
          <button class="accordion-button collapsed accordion-button-static" >
            {$title}
          </button>
        </h2>
    	<div id="collapse-{$itemId}" class="accordion-collapse collapse" aria-labelledby="heading-{$itemId}" data-bs-parent="#processListItems">
          <div class="accordion-body">
          </div>
        </div>
    </div>
AITEM;
}

/**
 * 
 * @param string $label
 * @param string $content
 * @return string
 */
$itemTitle = function( string $label, string $content ): string
{
    return <<<ITITLE
<table class="table table-sm table-borderless table-inputs">
    <tbody>
        <tr>
    		<th>{$label}</th>
    		<td>{$content}</td>
        </tr>
    </tbody>
</table>
ITITLE;
};

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
<style>
    .accordion-button-static
    {
        cursor: default !important;
    }
    .accordion-button-static table,
    .table-inputs
    {
        margin-bottom: 0rem !important;
    }
    .table-inputs tbody tr:first-of-type th
    {
        width: 16% !important;
    }
    .accordion-button-static::after
    {
        background-image: none;
    }
</style>
<h3>HTTP Request sequence</h3>
<hr>
<div class="accordion accordion-flush" id="processListItems">
<?php 
    print blockAccordionItemStatic( $itemTitle( 'URL', App::urlCurrent() ) );
    print blockAccordionItem( $itemTitle( 'Parameters', count( $_REQUEST ) ), $itemParametersBody() );
    print blockAccordionItem( $itemTitle( 'File', $_SERVER[ 'SCRIPT_NAME' ] ) , show_source( Env::path( '/index.php' ), TRUE ));
    print blockAccordionItem( $itemTitle( 'Request', get_class( $request ) ), show_source( $requestPath, TRUE ) );
    print blockAccordionItem( $itemTitle( 'Response', get_class( $response ) ), show_source( $responsePath, TRUE ) );
    print blockAccordionItem( $itemTitle( 'View', $response->pathTemplate() ), show_source( App::pathView( $response->pathTemplate() ), TRUE ) );
?>
</div>
