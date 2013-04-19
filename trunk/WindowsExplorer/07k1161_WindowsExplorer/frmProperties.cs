using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Microsoft.VisualBasic.FileIO;
using System.IO;
using System.Collections;
using System.Diagnostics;

namespace _07k1161_WindowsExplorer
{
    public partial class frmProperties : Form
    {
        public frmProperties()
        {
            InitializeComponent();
        }

        private void frmProperties_Load(object sender, EventArgs e)
        {
            btnApply.Enabled = false; ;
            try
            {
                ListViewItem lvi = new ListViewItem();
                lvi = Program.fmain.ItemDetail;
                if (lvi != null)
                {
                    Program.fproperties.Text = lvi.SubItems[0].Text.ToString() + " Properties";
                    string name = lvi.SubItems[0].Text.ToString();
                    if (name.Contains("."))
                    {
                        int i = name.IndexOf('.');
                        if (i != -1) txtName.Text = name.Substring(0, i).ToString();
                    }
                    else txtName.Text = lvi.SubItems[0].Text.ToString();
                    txtType.Text = lvi.SubItems[1].Text.ToString();
                    if ((txtType.Text != "File Folder") && (txtType.Text != "Fixed")) txtType.Text = txtType.Text.Trim().Substring(1, txtType.Text.Length - 1).ToString() + " File";
                    string[] locationarr = lvi.SubItems[4].Text.ToString().Split('\\');
                    txtLocation.Text = lvi.SubItems[4].Text.ToString().Replace(locationarr[locationarr.Length - 1], "");
                    DirectoryInfo di = new DirectoryInfo(lvi.SubItems[4].Text.ToString());
                    txtContain.Text = "";
                    if (di.Exists)
                    {
                        clsItem.Contains(di);
                        txtContain.Text = clsItem.fileCount.ToString() + " Files, " + clsItem.folderCount.ToString() + " Folders";
                        clsItem.fileCount = 0;
                        clsItem.folderCount = 0;
                        string s = di.Attributes.ToString();
                        if (di.Attributes.ToString().Contains("Archive")) cbArchive.Checked = true;
                        else cbArchive.Checked = false;
                        if (di.Attributes.ToString().Contains("ReadOnly")) cbReadOnly.Checked = true;
                        else cbReadOnly.Checked = false;
                        if (di.Attributes.ToString().Contains("Hidden")) cbHidden.Checked = true;
                        else cbHidden.Checked = false;
                    }
                    else txtContain.Text = "";
                    if (lvi.SubItems[1].Text != "File Folder")
                    {
                        txtSize.Text = lvi.SubItems[2].Text.ToString();
                    }
                    else//File Folder
                    {
                        long sizeKB = clsItem.folderSize / 1024;
                        long sizeMB = sizeKB / 1024;
                        long sizeGB = sizeMB / 1024;
                        if (sizeKB < 1000)
                            txtSize.Text = sizeKB.ToString() + " KB (" + clsItem.folderSize.ToString() + " bytes)";
                        else if (sizeMB < 1000) txtSize.Text = sizeMB.ToString() + "." + (sizeKB - sizeMB * 1024).ToString() + " MB (" + clsItem.folderSize.ToString() + " bytes)";
                        else txtSize.Text = sizeGB.ToString() + "." + (sizeMB - sizeGB * 1024).ToString() + " GB (" + clsItem.folderSize.ToString() + " bytes)";
                        clsItem.folderSize = 0;
                    }
                    txtCreated.Text = di.LastWriteTime.ToString();
                    
                }
            }
            catch { }
        }

        private void btnCancel_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void btnApply_Click(object sender, EventArgs e)
        {
            DirectoryInfo di = new DirectoryInfo(Program.fmain.ItemDetail.SubItems[4].Text.ToString());
            if (di.Exists)
            {
                if (cbArchive.Checked) di.Attributes |= FileAttributes.Archive;
                if (cbHidden.Checked) di.Attributes |= FileAttributes.Hidden;
                if (cbReadOnly.Checked) di.Attributes |= FileAttributes.ReadOnly;
                if (!cbArchive.Checked && (di.Attributes.ToString().Contains("Archive")))
                    di.Attributes ^= FileAttributes.Archive;
                if (!cbHidden.Checked && (di.Attributes.ToString().Contains("Hidden"))) 
                    di.Attributes ^= FileAttributes.Hidden;
                if (!cbReadOnly.Checked && (di.Attributes.ToString().Contains("ReadOnly"))) 
                    di.Attributes ^= FileAttributes.ReadOnly;
            }
            btnApply.Enabled = false;
        }

        private void btnOK_Click(object sender, EventArgs e)
        {
            btnApply.PerformClick();
            this.Close();
        }

        private void cbReadOnly_CheckedChanged(object sender, EventArgs e)
        {
            btnApply.Enabled = true;
        }

        private void txtName_TextChanged(object sender, EventArgs e)
        {
                btnApply.Enabled = true;
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            string path = "C:\\Documents and Settings\\All Users\\Documents";
            DirectoryInfo di = new DirectoryInfo(path);
            if (di.Exists)
                Process.Start(path);
        }

        
    }
}