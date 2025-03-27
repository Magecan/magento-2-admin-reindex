### 🛠️ **Magecan Admin Reindex Extension for Magento 2**

---

### 🚀 **Overview**

The **Magecan Admin Reindex** extension allows Magento 2 store administrators to easily manage and reindex data directly from the **Admin Panel**. With this extension, you can:

- View all available indexers in the admin panel.
- Select one or more indexers for reindexing.
- Perform bulk reindexing with a single action.
- Save time by avoiding the need to run CLI commands for reindexing.

---

### 🔥 **Features**
- ✅ **Admin UI Integration:** Adds a new menu item in the Magento admin panel under `System → Index Management`.
- ✅ **Bulk Reindexing:** Select multiple indexers and reindex them all at once.
- ✅ **User-friendly Interface:** Simplified admin interface for easier management.
- ✅ **ACL Support:** Permissions control using Magento ACL.

---

### 🛠️ **Installation**

1. **Upload the Extension**
```bash
app/code/Magecan/AdminReindex
```

2. **Run Magento Commands**
```bash
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
```

3. **Verify the Extension**
- Go to **Admin → System → Index Management**
- You should see the **Reindex** feature in the Action dropdown.

---

### ⚙️ **Usage**

1. **Navigate to:**  
   `Admin → System → Index Management`

2. **Select Indexers:**
   - Tick the checkboxes next to one or more indexers you want to reindex.

3. **Choose the Action:**
   - In the **Actions** dropdown, select `Reindex`.
   - Click the **Submit** button.

4. **Success Notification:**
   - A success message will confirm that the reindexing process has been completed.

---

### 🔒 **ACL Permissions**

To control access, you can manage permissions by navigating to:
- **System → Permissions → User Roles → [Select Role] → Role Resources**
- Enable or disable access to:
```
Magecan_AdminReindex::reindex
```

---

### 🛠️ **Uninstallation**
To remove the extension:

1. **Disable the Module**
```bash
php bin/magento module:disable Magecan_AdminReindex
```

2. **Remove the Files**
```bash
rm -rf app/code/Magecan/AdminReindex
```

3. **Run Magento Commands**
```bash
php bin/magento setup:upgrade
php bin/magento cache:flush
```

---

### 🛡️ **Compatibility**
- Magento Open Source and Adobe Commerce 2.4.x
- Compatible with PHP 7.4 and 8.2

---

### 📝 **Changelog**
- **1.0.0**: Initial release with admin reindex functionality.
