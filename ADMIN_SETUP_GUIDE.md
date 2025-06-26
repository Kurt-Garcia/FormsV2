# FormsV2 - Admin System Setup Guide

## Overview
FormsV2 now includes a comprehensive admin system with role-based access control, allowing administrators to review and approve form submissions while regular users can only submit forms.

## Features Added

### Admin Features
- **Admin Dashboard**: Overview of pending requests and system statistics
- **Pending Requests**: Review and approve/decline form submissions
- **All Records**: Browse all form submissions with filtering options
- **Approval System**: Approve or decline requests with admin remarks

### User Features
- **Form Submission**: Regular users can submit various forms
- **Restricted Access**: Users cannot view records (admin-only)
- **Status Tracking**: Users are informed when forms are submitted

## Default Accounts

### Admin Account
- **Email**: admin@formsv2.com
- **Password**: admin123
- **Role**: admin

### Sample User Account
- **Email**: user@formsv2.com  
- **Password**: user123
- **Role**: user

## Database Changes

### New Tables/Columns Added
1. **users table**: Added `role` column (user/admin)
2. **All form tables**: Added approval tracking columns:
   - `status_approval` (pending/approved/declined)
   - `admin_remarks` (optional admin comments)
   - `approved_by` (admin user ID)
   - `approved_at` (approval timestamp)

## How It Works

### For Regular Users
1. Login with user credentials
2. Access dashboard to fill out forms
3. Submit forms (status: pending)
4. Cannot view records or admin sections

### For Admins
1. Login with admin credentials
2. Automatically redirected to admin dashboard
3. View pending requests and statistics
4. Approve/decline requests with optional remarks
5. Browse all records with filtering options

## Routes Structure

### Public Routes
- `/` - Login page

### User Routes (Authenticated Users Only)
- `/dashboard` - User dashboard (auto-redirects admins)
- `/forms/{type}/submit` - Form submission endpoints

### Admin Routes (Admin Users Only)
- `/admin/dashboard` - Admin dashboard
- `/admin/pending-requests` - Review pending submissions  
- `/admin/all-records` - Browse all records
- `/admin/approve/{type}/{id}` - Approve a request
- `/admin/decline/{type}/{id}` - Decline a request
- `/data/*` - View record listings (admin only)

## Middleware

### AdminMiddleware
- Restricts access to admin-only sections
- Checks if user has 'admin' role

### UserMiddleware  
- Restricts access to user-only sections
- Checks if user has 'user' role

## File Structure

### New Files Added
```
app/Http/Controllers/AdminController.php
app/Http/Middleware/AdminMiddleware.php
app/Http/Middleware/UserMiddleware.php
resources/views/admin/
├── dashboard.blade.php
├── pending-requests.blade.php
├── all-records.blade.php
└── partials/
    ├── pending-table.blade.php
    └── records-table.blade.php
database/migrations/
├── 2024_12_26_000001_add_role_to_users_table.php
└── 2024_12_26_000002_add_approval_status_to_forms_tables.php
database/seeders/AdminUserSeeder.php
```

### Modified Files
- `routes/web.php` - Added admin routes and role-based routing
- `bootstrap/app.php` - Registered custom middleware
- `resources/views/dashboard.blade.php` - Added success notifications and role-based visibility
- All model files - Added approval relationships and fillable fields

## Setup Instructions

1. **Run Migrations** (if not already done):
   ```bash
   php artisan migrate
   ```

2. **Seed Admin User**:
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   ```

3. **Test the System**:
   - Login as admin: admin@formsv2.com / admin123
   - Login as user: user@formsv2.com / user123

## Usage Examples

### Admin Workflow
1. Login as admin
2. View dashboard statistics
3. Click "View Pending Requests"
4. Review form submissions
5. Approve/decline with optional remarks

### User Workflow
1. Login as regular user
2. Fill out any form from dashboard
3. Submit form (receives success message)
4. Form appears as "pending" in admin panel

## Security Features

- **Role-based Access Control**: Users cannot access admin sections
- **CSRF Protection**: All forms include CSRF tokens
- **Input Validation**: All form inputs are validated
- **Middleware Protection**: Admin routes protected by custom middleware

## Customization

### Adding New Admin Features
1. Add routes to admin route group in `web.php`
2. Add methods to `AdminController.php`
3. Create corresponding views in `resources/views/admin/`

### Modifying Approval Workflow
- Edit `AdminController::approve()` and `AdminController::decline()` methods
- Customize approval status options in migration files
- Update views to match new approval states

This admin system provides a complete solution for managing form submissions with proper role separation and approval workflows.
