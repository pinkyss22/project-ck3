using System;
using System.Collections.Generic;
using System.Text;
using System.Diagnostics;
using System.IO;
using System.Windows.Forms;

namespace _07k1161_WindowsExplorer
{
    class clsItem
    {
        //clsTreeView cls = new clsTreeView();
        private static string sourceDir = "", dest = "", sourceFile = "";
        public string strSrceFile
        {
            set
            {
                sourceFile = value;
            }
            get
            {
                return sourceFile;
            }
        }
        public string strSrceDir
        {
            set 
            {
                sourceDir = value;
            }
            get
            {
                return sourceDir;
            }
        }
        public string strDestDir
        {
            set
            {
                dest = value;
            }
            get
            {
                return dest;
            }
        }
        /* Ham copy file va folder
        public bool CopyDirectory(string strSrceDir, string strDestDir)
        {
            try
            {
                string[] arrSrceDir = strSrceDir.Split('\\');
                string folder = arrSrceDir[arrSrceDir.Length - 1];
                string strDest = strDestDir + folder;
                DirectoryInfo SourceDir = new DirectoryInfo(strSrceDir);
                DirectoryInfo DestDir = new DirectoryInfo(strDest);
                if (!DestDir.Exists)
                    DestDir.Create();
                foreach (FileInfo ChildFile in SourceDir.GetFiles())
                {
                    ChildFile.CopyTo(Path.Combine(DestDir.FullName, ChildFile.Name), true);
                }
                foreach (DirectoryInfo SubDir in SourceDir.GetDirectories())
                {
                    if (!SubDir.Exists)
                        SubDir.Create();
                    bool retVal;
                    retVal = CopyDirectory(SubDir.FullName, Path.Combine(DestDir.FullName, SubDir.Name));
                    if (!retVal)
                        return false;
                }
                return true;
            }
            catch 
            {
                //log any error...
                throw;
            }
        }
        public void CopyFile(string strSrceFile, string strDestDir)
        {
            FileInfo sourceFile = new FileInfo(strSrceFile);
            DirectoryInfo destDir = new DirectoryInfo(strDestDir);
            FileInfo isexist = new FileInfo(Path.Combine(destDir.FullName, sourceFile.Name));
            if (!destDir.Exists)
                destDir.Create();
            if (isexist.Exists)
            {
                DialogResult d = MessageBox.Show("Tên file này đã tồn tại!\n Bạn có muốn copy đè lên nó không?", "Confirm File Replace", MessageBoxButtons.YesNo, MessageBoxIcon.Question, MessageBoxDefaultButton.Button1);
                if (d == DialogResult.Yes) sourceFile.CopyTo(Path.Combine(destDir.FullName, sourceFile.Name), true);
            }
            else sourceFile.CopyTo(Path.Combine(destDir.FullName, sourceFile.Name), true);
        }
         */
        //public void DeleteItem(ListViewItem item, ListView listView)
        //{
        //    try
        //    {
        //        string path = item.SubItems[4].Text;
        //        if (item.SubItems[1].Text == "File Folder")
        //        {
        //            DirectoryInfo dir = new DirectoryInfo(path);
        //            if (!dir.Exists)
        //            {
        //                _07k1161_WindowsExplorer.WindowsExplorer.ShowErrorPath();
        //                return;
        //            }
        //            else
        //            {
        //                DialogResult d = MessageBox.Show("Are you sure want to remove the folder '" + item.Text.ToString() + "' and all its\ncontents?", "Confirm Folder Delete", MessageBoxButtons.YesNo, MessageBoxIcon.Question, MessageBoxDefaultButton.Button1);
        //                if (d == DialogResult.Yes)
        //                {
        //                    dir.Delete(true);
        //                }
        //                else return;
        //            }
                    
        //        }
        //        else
        //        {
        //            FileInfo file = new FileInfo(path);
        //            if (!file.Exists)
        //            {
        //                _07k1161_WindowsExplorer.WindowsExplorer.ShowErrorPath();
        //                return;
        //            }
        //            else
        //            {
        //                DialogResult dd = MessageBox.Show("Are you sure want to delete '" + item.Text.ToString() + "'?", "Confirm File Delete", MessageBoxButtons.YesNo, MessageBoxIcon.Question, MessageBoxDefaultButton.Button1);
        //                if (dd == DialogResult.Yes)
        //                {
        //                    file.Delete();
        //                }
        //                else return;
        //            }
                    
        //        }
        //        cls.OpenFolder(cls.Path, listView);

        //    }
        //    catch (Exception ex)
        //    {
        //        ShowError(ex);
        //    }
        //}
        //public void MoveItem(string pathMove, ListViewItem item, ListView listView)
        //{
        //    try
        //    {
        //        string path = item.SubItems[4].Text;
        //        if (item.SubItems[1].Text == "File Folder")
        //        {
        //            DirectoryInfo dir = new DirectoryInfo(path);
        //            if (!dir.Exists)
        //            {
        //                cls.ShowErrorPath();
        //                return;
        //            }
        //            dir.MoveTo(pathMove);
        //        }
        //        else
        //        {
        //            FileInfo file = new FileInfo(path);
        //            if (!file.Exists)
        //            {
        //                cls.ShowErrorPath();
        //                return;
        //            }
        //            file.MoveTo(pathMove);
        //        }
        //        cls.OpenFolder(cls.Path, listView);
        //    }
        //    catch (Exception ex)
        //    {
        //        clsTreeView.ShowError(ex);
        //    }
        //}
        //Ham liet dem tat ca so files va folders co trong mot thu muc
        public static int folderCount = 0, fileCount = 0;
        public static long folderSize = 0;
        public static void Contains(DirectoryInfo dir)
        {
            foreach (DirectoryInfo di in dir.GetDirectories())
            {
                folderCount++;
                Contains(di);
            }
            foreach (FileInfo fi in dir.GetFiles())
            {
                fileCount++;
                folderSize += fi.Length;
            }           
        }
    }
}
