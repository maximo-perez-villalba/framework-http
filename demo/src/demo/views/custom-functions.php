<?php

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
function itemTitle( string $label, string $content ): string
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
