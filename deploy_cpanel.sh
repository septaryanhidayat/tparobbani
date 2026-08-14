#!/bin/bash

echo "=========================================="
echo "🚀 TPA Robbani - cPanel Auto Fix & Deploy"
echo "=========================================="

# 1. Fix Permissions (Directory 755, Files 644)
echo "📁 Memperbaiki izin direktori (755) dan file (644)..."
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;

# 2. Fix Laravel Storage & Cache Permissions
echo "🔒 Memperbaiki izin storage & bootstrap/cache..."
chmod -R 775 storage bootstrap/cache 2>/dev/null || chmod -R 755 storage bootstrap/cache

# 3. Regenerate Clean .htaccess
echo "⚙️ Memperbarui file .htaccess..."
if [ -f .htaccess ]; then
    cp .htaccess .htaccess.bak
fi

cat << 'EOF' > .htaccess
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
EOF

# 4. Check PHP Version
echo "🐘 Memeriksa versi PHP CLI..."
php -v

# 5. Clear Caches
echo "🧹 Membersihkan cache Laravel..."
php artisan config:clear 2>/dev/null
php artisan cache:clear 2>/dev/null
php artisan route:clear 2>/dev/null
php artisan view:clear 2>/dev/null

echo "=========================================="
echo "✅ Selesai! Silakan refresh website Anda."
echo "=========================================="
