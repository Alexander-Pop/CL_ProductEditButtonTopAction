<?php
namespace CL\ProductEditButtonTopAction\Block\Adminhtml;
class Example extends \Magento\Backend\Block\Widget\Form\Container {
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;
    /**
     * Url
     *
     * @var \Magento\Framework\Url
     */
    protected $_url;
    /**
     * Block group
     *
     * @var string
     */
    protected $_blockGroup = 'CL_ProductEditButtonTopAction';
    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Url $url
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context, 
        \Magento\Framework\Registry $registry, 
        \Magento\Framework\Url $url,
        array $data = []
    ) {
        $this->_url = $url;
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
    protected function _construct() {
        $this->_objectId = 'product_id';
        $this->_controller = 'adminhtml';
        $this->_mode = 'example';
        $this->buttonList->add(
            'example', [
            'label' => __('Example'),
            'class' => 'example',
            'id' => 'catalog-product-edit-example',
            'sort_order' => '-100',
            'on_click' => sprintf("window.open('%s');", $this->getPreviewUrl()),
             ]
        );
        //parent::_construct();
    }
    /**
     * Retrieve order model object
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct()
    {
        return $this->_coreRegistry->registry('current_product');
    }
    /**
     *
     * @return string
     */
    public function getPreviewUrl() {
        //$product = $this->getProduct()->load($this->getProduct()->getId());
        $productUrl = $this->_url->getUrl(
            'catalog/product/view', 
            [
                'id' => $this->getProduct()->getId(), 
                '_nosid' => true
            ]
        );
        /*
         * Or
         * $productUrl = $this->_url->getUrl('catalog/product/view', ['id' => $this->getProduct()->getId(), '_nosid' => true, '_query' => ['___store' => 'default']]);
         */
        return $productUrl;
    }
}