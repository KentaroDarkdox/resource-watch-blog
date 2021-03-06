<?php

class WPML_TM_Overdue_Jobs_Report_Factory {

	public function create() {
		global $wpdb, $iclTranslationManagement;

		$jobs_collection = new WPML_Translation_Jobs_Collection( $wpdb, array() );
		$email_template_service_factory = new WPML_TM_Email_Twig_Template_Factory();
		$report_email_view = new WPML_TM_Email_Notification_View( $email_template_service_factory->create() );
		$has_active_remote_service = TranslationProxy::is_current_service_active_and_authenticated();
		$notification_settings = $iclTranslationManagement->settings['notification'];

		return new WPML_TM_Overdue_Jobs_Report(
			$jobs_collection,
			$report_email_view,
			$has_active_remote_service,
			$notification_settings
		);
	}
}
