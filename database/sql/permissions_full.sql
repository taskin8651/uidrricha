-- Full permission insert SQL
-- Inserts all application permissions if missing, then attaches all to admin role id 1.

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'user_management_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'user_management_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'permission_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'permission_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'permission_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'permission_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'permission_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'permission_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'permission_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'permission_delete');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'permission_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'permission_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'role_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'role_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'role_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'role_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'role_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'role_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'role_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'role_delete');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'role_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'role_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'user_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'user_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'user_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'user_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'user_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'user_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'user_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'user_delete');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'user_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'user_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'audit_log_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'audit_log_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'audit_log_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'audit_log_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'profile_password_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'profile_password_edit');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'service_section_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'service_section_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'service_section_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'service_section_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'service_section_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'service_section_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'service_section_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'service_section_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'service_section_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'service_section_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'about_page_section_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'about_page_section_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'about_page_section_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'about_page_section_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'hero_section_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'hero_section_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'hero_section_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'hero_section_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'dentist_profile_section_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'dentist_profile_section_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'dentist_profile_section_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'dentist_profile_section_edit');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_category_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_category_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_category_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_category_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_category_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_category_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_category_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_category_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_category_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_category_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_item_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_item_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_item_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_item_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_item_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_item_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_item_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_item_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'gallery_item_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'gallery_item_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'before_after_gallery_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'before_after_gallery_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'before_after_gallery_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'before_after_gallery_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'before_after_gallery_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'before_after_gallery_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'before_after_gallery_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'before_after_gallery_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'before_after_gallery_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'before_after_gallery_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'testimonial_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'testimonial_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'testimonial_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'testimonial_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'testimonial_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'testimonial_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'testimonial_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'testimonial_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'testimonial_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'testimonial_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'contact_enquiry_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'contact_enquiry_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'contact_enquiry_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'contact_enquiry_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'contact_enquiry_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'contact_enquiry_delete');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'appointment_request_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'appointment_request_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'appointment_request_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'appointment_request_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'appointment_request_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'appointment_request_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'website_setting_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'website_setting_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'website_setting_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'website_setting_edit');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'faq_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'faq_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'faq_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'faq_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'faq_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'faq_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'faq_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'faq_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'faq_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'faq_delete');

INSERT INTO permissions (title, created_at, updated_at)
SELECT 'epaper_access', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'epaper_access');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'epaper_create', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'epaper_create');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'epaper_show', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'epaper_show');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'epaper_edit', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'epaper_edit');
INSERT INTO permissions (title, created_at, updated_at)
SELECT 'epaper_delete', NOW(), NOW() WHERE NOT EXISTS (SELECT 1 FROM permissions WHERE title = 'epaper_delete');

INSERT INTO permission_role (role_id, permission_id)
SELECT 1, p.id
FROM permissions p
WHERE p.deleted_at IS NULL
  AND p.title IN (
    'user_management_access',
    'permission_create','permission_edit','permission_show','permission_delete','permission_access',
    'role_create','role_edit','role_show','role_delete','role_access',
    'user_create','user_edit','user_show','user_delete','user_access',
    'audit_log_show','audit_log_access','profile_password_edit',
    'service_section_access','service_section_create','service_section_show','service_section_edit','service_section_delete',
    'about_page_section_access','about_page_section_edit',
    'hero_section_access','hero_section_edit',
    'dentist_profile_section_access','dentist_profile_section_edit',
    'gallery_category_access','gallery_category_create','gallery_category_show','gallery_category_edit','gallery_category_delete',
    'gallery_item_access','gallery_item_create','gallery_item_show','gallery_item_edit','gallery_item_delete',
    'before_after_gallery_access','before_after_gallery_create','before_after_gallery_show','before_after_gallery_edit','before_after_gallery_delete',
    'testimonial_access','testimonial_create','testimonial_show','testimonial_edit','testimonial_delete',
    'contact_enquiry_access','contact_enquiry_show','contact_enquiry_delete',
    'appointment_request_access','appointment_request_show','appointment_request_delete',
    'website_setting_access','website_setting_edit',
    'faq_access','faq_create','faq_show','faq_edit','faq_delete',
    'epaper_access','epaper_create','epaper_show','epaper_edit','epaper_delete'
  )
  AND NOT EXISTS (
    SELECT 1
    FROM permission_role pr
    WHERE pr.role_id = 1
      AND pr.permission_id = p.id
  );
