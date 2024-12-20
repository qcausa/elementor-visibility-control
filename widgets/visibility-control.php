<?php
class Visibility_Control_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'visibility_control';
    }

    public function get_title() {
        return esc_html__('Visibility Control', 'visibility-manager');
    }

    public function get_icon() {
        return 'eicon-eye';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'visibility-manager'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_name',
            [
                'label' => esc_html__('Name', 'visibility-manager'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Container 1', 'visibility-manager'),
            ]
        );

        $repeater->add_control(
            'item_selector',
            [
                'label' => esc_html__('CSS Selector', 'visibility-manager'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '.container-1',
                'description' => esc_html__('Enter CSS class or ID (e.g., .container-1 or #container-1)', 'visibility-manager'),
            ]
        );

        $this->add_control(
            'visibility_items',
            [
                'label' => esc_html__('Visibility Items', 'visibility-manager'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'item_name' => esc_html__('Container 1', 'visibility-manager'),
                        'item_selector' => '.container-1',
                    ],
                ],
                'title_field' => '{{{ item_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="visibility-control-widget">
            <form class="visibility-form">
                <?php foreach ($settings['visibility_items'] as $item) : ?>
                    <div class="visibility-item">
                        <label>
                            <input type="checkbox" 
                                   name="visibility[]" 
                                   value="<?php echo esc_attr($item['item_selector']); ?>"
                                   data-name="<?php echo esc_attr($item['item_name']); ?>">
                            <?php echo esc_html($item['item_name']); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="save-visibility">
                    <?php echo esc_html__('Save', 'visibility-manager'); ?>
                </button>
            </form>
        </div>
        <?php
    }
} 