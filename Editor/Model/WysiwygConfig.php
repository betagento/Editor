<?php
namespace Betagento\Editor\Model;

class WysiwygConfig implements \Magento\Framework\Data\Wysiwyg\ConfigProviderInterface {

    

    /**
     * @var \Magento\Framework\View\Asset\Repository
     */
    private $assetRepo;

    /**
     * @param \Magento\Framework\View\Asset\Repository $assetRepo
     */
    public function __construct(\Magento\Framework\View\Asset\Repository $assetRepo)
    {
        $this->assetRepo = $assetRepo;
    }
    
    public function getConfig(\Magento\Framework\DataObject $config) : \Magento\Framework\DataObject
    {
        //echo 1; exit;
        $config->addData([
            'tinymce4' => [
                'toolbar' => 'formatselect | bold italic underline | alignleft aligncenter alignright | '
                    . 'bullist numlist | link table charmap',
                'plugins' => implode(
                    ' ',
                    [
                        'advlist',
                        'autolink',
                        'lists',
                        'link',
                        'charmap',
                        'media',
                        'noneditable',
                        'table',
                        'contextmenu',
                        'paste',
                        'code',
                        'help',
                        'table'
                    ]
                ),
                'content_css' => $this->assetRepo->getUrl('mage/adminhtml/wysiwyg/tiny_mce/themes/ui.css'),
                //'inline' => true
                
            ]
        ]);
        $config->addData(['settings' => [
            'extended_valid_elements' => "script[src|async|defer|type|charset]",
            'schema' => 'html5',
            //'inline' => 1
            
        ]]);
        return $config;
    }

}