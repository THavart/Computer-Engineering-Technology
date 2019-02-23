	<div class="pb pb-meta-box pb-meta-box-page-builder">
		
		<div class="pb-tab">
			
			<div id="pb-preloader"><span><?php esc_html_e('Loading ...',PLUGIN_PAGE_BUILDER_DOMAIN); ?></span></div>
			
			<ul>
				<li><a href="#pb-tab-layout"><?php esc_html_e('Layouts',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a></li>
				<li><a href="#pb-tab-component"><?php esc_html_e('Components',PLUGIN_PAGE_BUILDER_DOMAIN); ?></a></li>
			</ul>
			
			<div id="pb-tab-layout">
				<div>
					<ul class="pb-reset-list pb-clear-fix">
						<?php echo $this->data->layoutHTML; ?>
					</ul>
				</div>
			</div>
			
			<div id="pb-tab-component">
				<div>
					<ul class="pb-reset-list pb-clear-fix">
						<?php echo $this->data->componentHTML; ?>
					</ul>	
				</div>
			</div>

		</div>
		
		<div id="pb-content">
			
			<div id="pb-content-caption"><div><?php esc_html_e('To start build page, drag and drop selected layout here',PLUGIN_PAGE_BUILDER_DOMAIN); ?></div></div>
			
			<ul class="pb-reset-list pb-clear-fix">
				<?php echo $this->data->contentHTML; ?>
			</ul>
			
		</div>
		
		<?php global $post; ?>

		<input type="hidden" id="postId" value="<?php echo $post->ID; ?>"/>
		
		<div id="pb-dialog-line-remove" class="pb-hidden" title="<?php esc_attr_e('Delete layout',PLUGIN_PAGE_BUILDER_DOMAIN); ?>">
			<p><?php esc_html_e('Are you sure that you would like to remove this layout ?',PLUGIN_PAGE_BUILDER_DOMAIN); ?></p>
		</div>
		
		<div id="pb-dialog-component-remove" class="pb-hidden" title="<?php esc_attr_e('Remove component',PLUGIN_PAGE_BUILDER_DOMAIN); ?>">
			<p><?php esc_html_e('Are you sure that you would like to remove this element ?',PLUGIN_PAGE_BUILDER_DOMAIN); ?></p>
		</div>	
		
		<div id="pb-dialog-component-all-in-column-remove" class="pb-hidden" title="<?php esc_attr_e('Remove all components in column',PLUGIN_PAGE_BUILDER_DOMAIN); ?>">
			<p><?php esc_html_e('Are you sure that you would like to remove all components in this column ?',PLUGIN_PAGE_BUILDER_DOMAIN); ?></p>
		</div>		
		
		<div id="pb-dialog-edit"></div>
		
		<div id="pb-dialog-edit-shortcode"></div>
			
	</div>

	<script type="text/javascript">
		
		jQuery(document).ready(function($) 
		{
			$().pageBuilder(
			{
				
			});
		});
		
	</script>