using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Management;
using System.IO;
using System.Globalization;
using System.Diagnostics;
using Microsoft.VisualBasic.FileIO;
using OC.Windows.Forms;

namespace _07k1161_WindowsExplorer
{
    public partial class WindowsExplorer : Form
    {
        public WindowsExplorer()
        {
            
            InitializeComponent();
            #region khoi tao History

            
            history = new History<TreeNode>(sbtnBack, sbtnFoward, 8);
            history.GotoItem += new
              EventHandler<HistoryEventArgs<TreeNode>>(history_GotoItem);

            // anonymous methods are cool

            history.MenuTexts = delegate(TreeNode node) { return node.Text; };
            history.MenuImages = delegate(TreeNode node)
            {
                return
                    treeView1.ImageList != null && !string.IsNullOrEmpty(node.ImageKey)
                    ? treeView1.ImageList.Images[node.ImageKey] : null;
            };




            #endregion
        }


        private History<TreeNode> history;

        // Khong cho trung lap trong history
        public void KhongTrung()
        {
            history.AllowDuplicates=false;
        }
        
        private void history_GotoItem(object sender,HistoryEventArgs<TreeNode> e)
        {
            //TreeNode temp = e.Item;
            treeView1.SelectedNode = e.Item;
            
            
        }


        

        
        public string path = "";
        public bool flagRename=false;
        public bool flagNewFolder = false;



        #region Duyet treeview


        /// <summary>
        /// Lấy Danh sách các ổ đĩa.
        /// </summary>
        /// <returns></returns>
        protected ManagementObjectCollection GetDrivers()
        {
            ManagementObjectSearcher query = new ManagementObjectSearcher("Select * From Win32_LogicalDisk");
            ManagementObjectCollection queryCollection = query.Get();

            return queryCollection;
        }

        /// <summary>
        /// Khởi tạo Listview
        /// </summary>
        protected void InitListView()
        {
            // Khởi tạo Listview ban đầu
            listView1.Clear();
            //// Tạo các header cho Listview
            listView1.Columns.Add("Name", 140, HorizontalAlignment.Left);
            listView1.Columns.Add("Size", 75, HorizontalAlignment.Right);
            listView1.Columns.Add("Date Create", 140, HorizontalAlignment.Right);
            listView1.Columns.Add("Date Modified", 140, HorizontalAlignment.Right);
        }

        private void PopulateDriveList()
        {
            TreeNode nodeTreeNode;
            int imageIndex = 0;
            int selectIndex = 0;

            const int Removable = 2;
            const int LocalDisk = 3;
            const int Network = 4;
            const int CD = 5;

            this.Cursor = Cursors.WaitCursor;
            // Xóa Treeview
            treeView1.Nodes.Clear();
            nodeTreeNode = new TreeNode("My Computer", 0, 0);
            treeView1.Nodes.Add(nodeTreeNode);

            // Thiết lập tập hợp các Node
            TreeNodeCollection nodeCollection = nodeTreeNode.Nodes;

            // Lấy danh sách các ổ đĩa
            ManagementObjectCollection queryCollection = GetDrivers();


            foreach (ManagementObject mo in queryCollection)
            {
                switch (int.Parse(mo["DriveType"].ToString()))
                {

                    case Removable:			// Các Ổ Đĩa Mềm
                        imageIndex = 5;
                        selectIndex = 5;
                        break;
                    case LocalDisk:			// Các Ổ Đĩa Cứng
                        imageIndex = 6;
                        selectIndex = 6;
                        break;
                    case CD:				// Các Ổ Đĩa CD
                        imageIndex = 7;
                        selectIndex = 7;
                        break;
                    case Network:			// Các Ổ Liên Kết qua mạng
                        imageIndex = 8;
                        selectIndex = 8;
                        break;
                    default:
                        imageIndex = 2;
                        selectIndex = 3;
                        break;
                }
                // Tạo một Driver Node mới
                nodeTreeNode = new TreeNode(mo["Name"].ToString() + "\\", imageIndex, selectIndex);

                // Chèn vào Treeview
                nodeCollection.Add(nodeTreeNode);

            }

            InitListView();
            this.Cursor = Cursors.Default;

        }

        private void treeView1_AfterSelect(object sender, TreeViewEventArgs e)
        {
            history.CurrentItem = treeView1.SelectedNode;

            // Phân bố thư mục hoặc File khi một thư mục được chọn
            this.Cursor = Cursors.WaitCursor;

            // Lấy ổ đĩa hoặc thư mục đang được lựa chọn
            TreeNode currentNode = e.Node;
            //history.CurrentItem = currentNode;

            // Xóa toàn bộ thư mục con
            currentNode.Nodes.Clear();

            if (currentNode.SelectedImageIndex == 0)
            {
                // My Computer được chọn - Phân bố lại danh sách các ổ đĩa.
                PopulateDriveList();

                path = "My Computer";
                //hien thi len thanh address my computer
                tscbnAddress.Text = path;
            }
            else
            {
                // Phân bố các thư mục con và các File.
                PopulateDirectory(currentNode, currentNode.Nodes);
                //hien thi len thanh address duong dan thu muc
                path = GetFullPath(currentNode.FullPath);
                path=LayDuongDan(path);
                tscbnAddress.Text = path;
            }
            this.Cursor = Cursors.Default;
            

        }

        public int LayViTri(string s)
        {
            char[] chtam;
            chtam = s.ToCharArray();
            int vitri=0;
            for (int i = chtam.Length-1; i >= 0; i--)
            {
                if (chtam[i] == '\\')
                    vitri = i;
            }
            return vitri;
        }

        private static string LayDuongDan(string fullpath)
        {
            char[] arr = { '\\' };
            string path = "";
            string[] nameList = fullpath.Split(arr);
            string nodeName = nameList.GetValue(0).ToString();

            path += nodeName + "\\";
            for (int i = 2; i < nameList.Length; i++)
                
                path += nameList[i] + "\\";
            return path;
        }


        protected void PopulateDirectory(TreeNode currentNode, TreeNodeCollection currentNodeCollection)
        {
            TreeNode nodeDir;
            int imageIndex = 2;  // Chỉ mục ảnh khi không được chọn
            int selectIndex = 3; // Chỉ mục ảnh khi được chọn.

            if (currentNode.SelectedImageIndex != 0)
            {
                // phân bố các thư mục trong Treeview
                try
                {
                    // Kiểm tra đường dẫn
                    if (Directory.Exists(GetFullPath(currentNode.FullPath)) == false)
                    {
                        MessageBox.Show("o dia hoac thu muc " + currentNode.ToString() + " khong ton tai");
                    }
                    else
                    {
                        //Phân bố các Files.
                        PopulateFiles(currentNode);

                        string[] stringDirectories = Directory.GetDirectories(GetFullPath(currentNode.FullPath));
                        string stringFullPath = "";
                        string stringPathName = "";
                        

                        // Lặp qua tất cả các thư mục
                        foreach (string stringDir in stringDirectories)
                        {
                            stringFullPath = stringDir;
                            stringPathName = GetPathName(stringDir);

                            //hiển thị đường dẫn lên thanh address
                           
                           
                            //int vt = LayViTri(stringFullPath);
                            //stringFullPath.Remove(vt);
                            //currentNode.FullPath; //stringFullPath;
                            
                                                   
                            
                            


                            // Tạo các Node cho thư mục
                            nodeDir = new TreeNode(stringPathName.ToString(), imageIndex, selectIndex);
                            currentNodeCollection.Add(nodeDir);

                            //DirectoryInfo rootDir = GetRootDir(nodeDir);
                            //string path = rootDir.FullName;
                            
                            //tscbnAddress.Text = path;
                            
                            
                        }
                    }
                }
                catch (IOException )
                {
                    MessageBox.Show("Lỗi: Ổ đĩa không có hoặc thư mục không tồn tại.");
                }
                catch (UnauthorizedAccessException )
                {
                    MessageBox.Show("Lỗi: Bạn không có quyền truy cập vào ổ đĩa hoặc thư mục này");
                }
                catch (Exception e)
                {
                    MessageBox.Show("Lỗi " + e);
                }
            }
        }

        //lay thu muc goc

        private static DirectoryInfo GetRootDir(TreeNode parentNode)
        {
            char[] arr = { '\\' };
            string path = "";
            string[] nameList = parentNode.FullPath.Split(arr);
            string nodeName = nameList.GetValue(1).ToString();
            path += nodeName + "\\";
            
            for (int i = 2; i < nameList.Length; i++)
                path += nameList[i] + "\\";
            return new DirectoryInfo(path);
        }


        /// <summary>
        /// Phân bố các File vào Listview.
        /// </summary>
        /// <param name="currentNode"></param>
        protected void PopulateFiles(TreeNode currentNode)
        {
            string[] lvData = new string[5];

            InitListView();

            if (currentNode.SelectedImageIndex != 0)
            {
                // Kiểm tra đường dẫn
                if (Directory.Exists(GetFullPath(currentNode.FullPath)) == false)
                {
                    MessageBox.Show("Thư mục hoặc đường dẫn" + currentNode.ToString() + "Không tồn tại");
                }
                else
                {
                    try
                    {
                        DirectoryInfo rootDir = GetRootDir(currentNode);

                        DuyetFoldersVaFiles(rootDir, listView1);


                        //cho nay tam de day neu co sai thi dung lai:
                        #region duyet file va folder hien thi len listview


                        //string[] stringFiles = Directory.GetFiles(GetFullPath(currentNode.FullPath));
                        //string stringFileName = null;
                        //DirectoryInfo rootDir = GetRootDir(currentNode);
                        

                        //DateTime dtCreateDate, dtModifyDate;
                        //Int64 lFileSize = 0;

                        ////duyet tat ca folder

                        //foreach (DirectoryInfo dir in rootDir.GetDirectories())
                        //{

                        //    // Ghi dữ liệu vào Listview
                        //    DirectoryInfo folder = new DirectoryInfo(dir.FullName);
                            

                        //    lvData[0] = folder.Name;
                        //    lvData[1] = "Folder";

                        //    lvData[2] = folder.CreationTime.ToString();

                        //    lvData[3] = folder.LastWriteTime.ToString();

                        //    lvData[4] = folder.FullName;

                        //    ListViewItem lvItemFolder = new ListViewItem(lvData, 0);
                        //    lvItemFolder.ImageKey="Folder";
                                                                                  
                        //    listView1.Items.Add(lvItemFolder);
                        //}


                        //// Duyệt tất cả các File.
                        //foreach (string stringFile in stringFiles)
                        //{
                        //    stringFileName = stringFile;
                        //    FileInfo objFileSize = new FileInfo(stringFileName);
                        //    lFileSize = objFileSize.Length;
                        //    dtCreateDate = objFileSize.CreationTime;
                        //    dtModifyDate = objFileSize.LastWriteTime;

                        //    // Ghi dữ liệu vào Listview
                        //    lvData[0] = GetPathName(stringFileName);
                        //    lvData[1] = FormatSize(lFileSize);

                        //    lvData[2] = FormatDate(dtCreateDate);

                        //    lvData[3] = FormatDate(dtModifyDate);
                        //    lvData[4] = objFileSize.FullName;

                        //    ListViewItem lvItem = new ListViewItem(lvData, 0);
                        //    //lvItem.ImageKey = "txt";

                        //    //hien thi icon cho tat ca cac file
                        //    #region hien thi icon
                        //    switch (objFileSize.Extension.ToUpper())
                        //    {
                        //        case ".TXT":
                        //        case ".DIZ":
                        //        case ".LOG":
                        //            lvItem.ImageKey = "txt";
                        //            break;
                        //        case ".PDF":
                        //            lvItem.ImageKey = "pdf";
                        //            break;
                        //        case ".HTM":
                        //        case "HTML.":
                        //            lvItem.ImageKey = "htm";
                        //            break;
                        //        case ".DOC":
                        //            lvItem.ImageKey = "word.ico";
                        //            break;
                        //        case ".EXE":
                        //            lvItem.ImageKey = "exe";
                        //            break;
                        //        case ".JPG":
                        //        case ".BMP":
                        //            lvItem.ImageKey = "bmp";
                        //            break;
                        //        case ".SLN":
                        //            lvItem.ImageKey = "sln";
                        //            break;
                        //        case ".MP3":
                        //        case ".WAV":
                        //        case ".WMV":
                        //        case ".ASF":
                        //        case ".MPEG":
                        //        case ".AVI":
                        //            lvItem.ImageKey = "music";
                        //            break;
                        //        case ".RAR":
                        //        case ".ZIP":
                        //            lvItem.ImageKey = "rar.ico";
                        //            break;
                        //        case ".PPT":
                        //        case ".PPTX":
                        //            lvItem.ImageKey="ppt.ico";
                        //            break;
                        //        case ".MDB":
                        //            lvItem.ImageKey="access.ico";
                        //            break;
                        //        case ".XLS":
                        //        case ".XLSX":
                        //            lvItem.ImageKey="excel.ico";
                        //            break;
                        //        //case ".DLL":
                        //        //case ".REG":
                        //        case ".INI":
                        //        case ".INF":
                        //            lvItem.ImageKey = "inf";
                        //            break;
                        //        case ".SWF":
                        //        case ".FLV":
                        //        case ".FLA":
                        //            lvItem.ImageKey = "swf";
                        //            break;
                        //        default:
                        //            lvItem.ImageKey = "File";
                        //            break;
                        //    }

                        //    #endregion


                        //    listView1.Items.Add(lvItem);


                        //}

                        #endregion




                    }

                    catch (IOException )
                    {
                        MessageBox.Show("Lỗi: Ổ đĩa không có hoặc thư mục không tồn tại.");
                    }
                    catch (UnauthorizedAccessException )
                    {
                        MessageBox.Show("Lỗi: Bạn không có quyền truy cập vào ổ đĩa hoặc thư mục này");
                    }
                    catch (Exception e)
                    {
                        MessageBox.Show("Lỗi " + e);
                    }
                }
            }
        }

        /// <summary>
        /// Chuyển sang định dạng ngày giờ Ngắn.
        /// </summary>
        /// <param name="dtDate"></param>
        /// <returns></returns>
        protected string FormatDate(DateTime dtDate)
        {
            string stringDate = "";
            stringDate = dtDate.ToShortDateString().ToString() + " " + dtDate.ToShortTimeString().ToString();

            return stringDate;
        }

        /// <summary>
        /// Chuyển định dạng từ Số sang KB
        /// </summary>
        /// <param name="lSize"></param>
        /// <returns></returns>
        protected string FormatSize(Int64 lSize)
        {
            string stringSize = "";
            NumberFormatInfo myNfi = new NumberFormatInfo();

            Int64 lKBSize = 0;
            if (lSize < 1024)
            {
                if (lSize == 0)
                {
                    stringSize = "0";
                }
                else
                    stringSize = "1"; // Dung Lượng lớn hơn 0 và nhỏ hơn 1024 làm tròn thành 1 KB
            }
            else
            {
                lKBSize = lSize / 1024;
                // Chuyển sang định dạng chuẩn
                stringSize = lKBSize.ToString("n", myNfi);
                // Cắt bỏ phần thập phân.
                stringSize = stringSize.Replace(".00", "");
            }

            return stringSize + " KB";
        }

        /// <summary>
        /// Lấy tên của thư mục
        /// </summary>
        /// <param name="stringPath"></param>
        /// <returns></returns>
        protected string GetPathName(string stringPath)
        {
            string[] stringSplit = stringPath.Split('\\');
            int _maxIndex = stringSplit.Length;

            return stringSplit[_maxIndex - 1];
        }

        /// <summary>
        /// Lấy Đường dẫn đầy đủ.
        /// </summary>
        /// <param name="stringPath"></param>
        /// <returns></returns>
        protected string GetFullPath(string stringPath)
        {
            string stringParse = "";
            // Xóa bỏ My Computer khỏi đường dẫn
            stringParse = stringPath.Replace("My Computer\\", "");

            return stringParse;
        }





        #endregion


        private void Form1_KeyUp(object sender, KeyEventArgs e)
        {

        }

        private void tsbtnUp_Click(object sender, EventArgs e)
        {
            try
            {
                string[] mang = path.Split('\\');
                if (path.Length!=3&&path!="My Computer")   //kiem tra xem co phai thu muc goc ko
                {
                    //lay thu muc cha
                    string parent = FileSystem.GetParentPath(path);
                    //cap nhat duong dan
                    path = parent;
                    //gan duong dan len thanh address
                    tscbnAddress.Text = path + "\\";
                    //hien thi thu muc dang mo len form
                    string[] arr = path.Split('\\');
                    string name = arr[arr.Length - 1];
                    this.Text = name;
                    DirectoryInfo rootDir = new DirectoryInfo(parent);
                    DuyetFoldersVaFiles(rootDir, listView1);
                }
                else if(path.Length==3)
                {
                    path="My Computer";
                    tscbnAddress.Text = path;
                    this.Text="My Computer";

                }
                else if(path=="My Computer")
                {
                    MessageBox.Show("Ko the len thu muc cao hon dc!");
                }
            }
            catch(Exception ex)
            {
                ShowError(ex);

            }

            
        }

        private void Form1_SizeChanged(object sender, EventArgs e)
        {
            tsAddress.Width = this.Width - 150;
            tscbnAddress.Width = this.Width - 150;


        }

        private void listView1_MouseUp(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Right)
            {
                if (this.listView1.SelectedItems.Count > 0)
                {
                    this.contextMenuStrip1.Show(listView1, e.Location);
                }
                else
                {
                    this.contextMenuStrip2.Show(listView1, e.Location);
                }
            }
        }


        //public void Open(ListViewItem lvItem, ListView listView)
        //{
        //    try
        //    {
        //        string path = lvItem.SubItems[4].Text;
        //        if (path == "MyComputer")
        //        {
        //            GetAllDriver(listView);
        //            return;
        //        }
        //        FileInfo fi = new FileInfo(path);
        //        if (fi.Exists)
        //        {
        //            Process.Start(path);
        //        }
        //        else
        //        {
        //            DirectoryInfo rootDir = new DirectoryInfo(path + "\\");
        //            if (!rootDir.Exists)
        //            {
        //                ShowErrorPath();
        //                return;
        //            }
        //            GetAllInDirectory(rootDir, listView);
        //        }
        //    }
        //    catch (Exception ex)
        //    {
        //        ShowError(ex);
        //    }
        //}

        public void DuyetFolders(DirectoryInfo rootDir, ListView lv)
        {
            string[] lvData = new string[5];

            foreach (DirectoryInfo dir in rootDir.GetDirectories())
            {

                // Ghi dữ liệu vào Listview
                DirectoryInfo folder = new DirectoryInfo(dir.FullName);


                lvData[0] = folder.Name;
                lvData[1] = "Folder";

                lvData[2] = folder.CreationTime.ToString();

                lvData[3] = folder.LastWriteTime.ToString();

                lvData[4] = folder.FullName;
                

                ListViewItem lvItemFolder = new ListViewItem(lvData, 0);
                lvItemFolder.ImageKey = "Folder";

                lv.Items.Add(lvItemFolder);
            }
 
        }

        public void DuyetFiles(string path, ListView lv)
        {
            string[] stringFiles = Directory.GetFiles(path);
            string stringFileName = null;
            string[] lvData = new string[5];


            DateTime dtCreateDate, dtModifyDate;
            Int64 lFileSize = 0;

            foreach (string stringFile in stringFiles)
            {
                stringFileName = stringFile;
                FileInfo objFileSize = new FileInfo(stringFileName);
                lFileSize = objFileSize.Length;
                dtCreateDate = objFileSize.CreationTime;
                dtModifyDate = objFileSize.LastWriteTime;

                // Ghi dữ liệu vào Listview
                lvData[0] = GetPathName(stringFileName);
                lvData[1] = FormatSize(lFileSize);

                lvData[2] = FormatDate(dtCreateDate);

                lvData[3] = FormatDate(dtModifyDate);
                lvData[4] = objFileSize.FullName;


                ListViewItem lvItem = new ListViewItem(lvData, 0);
                //lvItem.ImageKey = "txt";

                //hien thi icon cho tat ca cac file
                #region hien thi icon
                switch (objFileSize.Extension.ToUpper())
                {
                    case ".TXT":
                    case ".DIZ":
                    case ".LOG":
                        lvItem.ImageKey = "txt";
                        break;
                    case ".PDF":
                        lvItem.ImageKey = "pdf";
                        break;
                    case ".HTM":
                    case "HTML.":
                        lvItem.ImageKey = "htm";
                        break;
                    case ".DOC":
                        lvItem.ImageKey = "word.ico";
                        break;
                    case ".EXE":
                        lvItem.ImageKey = "exe";
                        break;
                    case ".JPG":
                    case ".BMP":
                        lvItem.ImageKey = "bmp";
                        break;
                    case ".SLN":
                        lvItem.ImageKey = "sln";
                        break;
                    case ".MP3":
                    case ".WAV":
                    case ".WMV":
                    case ".ASF":
                    case ".MPEG":
                    case ".AVI":
                        lvItem.ImageKey = "music";
                        break;
                    case ".RAR":
                    case ".ZIP":
                        lvItem.ImageKey = "rar.ico";
                        break;
                    case ".PPT":
                    case ".PPTX":
                        lvItem.ImageKey = "ppt.ico";
                        break;
                    case ".MDB":
                        lvItem.ImageKey = "access.ico";
                        break;
                    case ".XLS":
                    case ".XLSX":
                        lvItem.ImageKey = "excel.ico";
                        break;
                    //case ".DLL":
                    //case ".REG":
                    case ".INI":
                    case ".INF":
                        lvItem.ImageKey = "inf";
                        break;
                    case ".SWF":
                    case ".FLV":
                    case ".FLA":
                        lvItem.ImageKey = "swf";
                        break;
                    default:
                        lvItem.ImageKey = "File";
                        break;
                }

                #endregion


                lv.Items.Add(lvItem);

            }
 
        }

        public void DuyetFoldersVaFiles(DirectoryInfo rootDir, ListView lv)
        {
            try
            {
                
                lv.Items.Clear();
                            
                DuyetFolders(rootDir, lv);
                DuyetFiles(rootDir.FullName, lv);
               
            }
            catch (Exception ex)
            {
                ShowError(ex);
            }
        }


        public static void ShowErrorPath()
        {
            MessageBox.Show("Invalid path!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
        }

        public static void ShowError(Exception ex)
        {
            MessageBox.Show(ex.Message, "Error!", MessageBoxButtons.OK, MessageBoxIcon.Error);
        }


        private void listView1_MouseDoubleClick(object sender, MouseEventArgs e)
        {
            ListViewItem item = listView1.FocusedItem;
            string pathItem = item.SubItems[4].Text;
            if (item.SubItems[1].Text == "Folder")
            {
                tscbnAddress.Text = pathItem + "\\";
            }
            
            
            //string[] lvData = new string[5];

            try
            {//start try

                FileInfo fi = new FileInfo(pathItem);
                if (fi.Exists)
                {
                    Process.Start(pathItem);
                    
                    path = fi.DirectoryName;
                }
                else
                {
                    DirectoryInfo rootDir = new DirectoryInfo(pathItem + "\\");
                    if (!rootDir.Exists)
                    {
                        ShowErrorPath();
                        return;
                    }
                    //listView1.Items.Clear(); //xoa cac item 

                    DuyetFoldersVaFiles(rootDir, listView1);
                    path = pathItem;

                    //dong nay tam de day lo co sai thi dung lai
                    #region Lay cac file va folders trong 1 folder

                    //foreach (DirectoryInfo dir in rootDir.GetDirectories())
                    //{

                    //    // Ghi dữ liệu vào Listview
                    //    DirectoryInfo folder = new DirectoryInfo(dir.FullName);


                    //    lvData[0] = folder.Name;
                    //    lvData[1] = "Folder";

                    //    lvData[2] = folder.CreationTime.ToString();

                    //    lvData[3] = folder.LastWriteTime.ToString();

                    //    lvData[4] = folder.FullName;

                    //    ListViewItem lvItemFolder = new ListViewItem(lvData, 0);
                    //    lvItemFolder.ImageKey = "Folder";

                    //    listView1.Items.Add(lvItemFolder);
                    //}
                    //// Duyệt tất cả các File.

                    //string[] stringFiles = Directory.GetFiles(path);
                    //string stringFileName = null;

                    //DateTime dtCreateDate, dtModifyDate;
                    //Int64 lFileSize = 0;

                    //foreach (string stringFile in stringFiles)
                    //{
                    //    stringFileName = stringFile;
                    //    FileInfo objFileSize = new FileInfo(stringFileName);
                    //    lFileSize = objFileSize.Length;
                    //    dtCreateDate = objFileSize.CreationTime;
                    //    dtModifyDate = objFileSize.LastWriteTime;

                    //    // Ghi dữ liệu vào Listview
                    //    lvData[0] = GetPathName(stringFileName);
                    //    lvData[1] = FormatSize(lFileSize);

                    //    lvData[2] = FormatDate(dtCreateDate);

                    //    lvData[3] = FormatDate(dtModifyDate);
                    //    lvData[4] = objFileSize.FullName;


                    //    ListViewItem lvItem = new ListViewItem(lvData, 0);
                    //    //lvItem.ImageKey = "txt";

                    //    //hien thi icon cho tat ca cac file
                    //    #region hien thi icon
                    //    switch (objFileSize.Extension.ToUpper())
                    //    {
                    //        case ".TXT":
                    //        case ".DIZ":
                    //        case ".LOG":
                    //            lvItem.ImageKey = "txt";
                    //            break;
                    //        case ".PDF":
                    //            lvItem.ImageKey = "pdf";
                    //            break;
                    //        case ".HTM":
                    //        case "HTML.":
                    //            lvItem.ImageKey = "htm";
                    //            break;
                    //        case ".DOC":
                    //            lvItem.ImageKey = "word.ico";
                    //            break;
                    //        case ".EXE":
                    //            lvItem.ImageKey = "exe";
                    //            break;
                    //        case ".JPG":
                    //        case ".BMP":
                    //            lvItem.ImageKey = "bmp";
                    //            break;
                    //        case ".SLN":
                    //            lvItem.ImageKey = "sln";
                    //            break;
                    //        case ".MP3":
                    //        case ".WAV":
                    //        case ".WMV":
                    //        case ".ASF":
                    //        case ".MPEG":
                    //        case ".AVI":
                    //            lvItem.ImageKey = "music";
                    //            break;
                    //        case ".RAR":
                    //        case ".ZIP":
                    //            lvItem.ImageKey = "rar.ico";
                    //            break;
                    //        case ".PPT":
                    //        case ".PPTX":
                    //            lvItem.ImageKey = "ppt.ico";
                    //            break;
                    //        case ".MDB":
                    //            lvItem.ImageKey = "access.ico";
                    //            break;
                    //        case ".XLS":
                    //        case ".XLSX":
                    //            lvItem.ImageKey = "excel.ico";
                    //            break;
                    //        //case ".DLL":
                    //        //case ".REG":
                    //        case ".INI":
                    //        case ".INF":
                    //            lvItem.ImageKey = "inf";
                    //            break;
                    //        case ".SWF":
                    //        case ".FLV":
                    //        case ".FLA":
                    //            lvItem.ImageKey = "swf";
                    //            break;
                    //        default:
                    //            lvItem.ImageKey = "File";
                    //            break;
                    //    }

                    //    #endregion


                    //    listView1.Items.Add(lvItem);


                    //}
                    #endregion


                }

            }//end try
            catch (Win32Exception )
            {
                MessageBox.Show("Trong may Khong co chuong trinh nao co the mo loai file nay !");
            }
            catch (Exception ex)
            {
                ShowError(ex);
            }


            //cls.OpenFolder(item, lvListView);
            //cboPath.Text = cls.Path;
            //Program.fmain.Text = item.Text;
            //cls.HistoryAdd();
            //statusLabel1.Text = lvListView.Items.Count.ToString() + " object(s)";   

        }





        private void listView1_ItemActivate(object sender, EventArgs e)
        {
            this.Text = listView1.SelectedItems[0].Text;
        }

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            about a = new about();
            a.Show();
        }

        private void closeToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();


        }

        //tao thu muc

        private void newFolderToolStripMenuItem_Click(object sender, EventArgs e)
        {
            flagNewFolder = true;
            ListViewItem item = new ListViewItem();
            item.Text = "New Folder";

            listView1.LabelEdit = true;
            
            listView1.Items.Add(item);
            
            //string FolderVuaTao=listView1.Items
            item.ImageKey = "folder";
            item.BeginEdit();
            //string ten= listView1.LabelEdit.ToString();
            //string p=path;
            

            //if (!Microsoft.VisualBasic.FileIO.FileSystem.DirectoryExists(path))
            //{
            //    Microsoft.VisualBasic.FileIO.FileSystem.CreateDirectory(path);
            //}
            //else


            
        }

        private void listView1_AfterLabelEdit(object sender, LabelEditEventArgs e)
        {
            string pathNewFolder=path+ "\\" + e.Label;
            DirectoryInfo rootDir = new DirectoryInfo(path);
            if (e.Label == null)
                pathNewFolder = path + "\\New Folder";


            if (flagNewFolder)
            {
                if (!Microsoft.VisualBasic.FileIO.FileSystem.DirectoryExists(pathNewFolder))
                {
                    Microsoft.VisualBasic.FileIO.FileSystem.CreateDirectory(pathNewFolder);
                    //ListViewItem newItem = listView1.FocusedItem;
                    //listView1.Items.Remove(newItem);
                    DuyetFoldersVaFiles(rootDir, listView1);
                    e.CancelEdit = true;


                }
                else
                {
                    MessageBox.Show("Thu muc " + e.Label + "da ton tai rui !");
                }
            }
            else if(flagRename)
            {
                try
                {
                    ListViewItem curr = listView1.FocusedItem;
                    string currpath = curr.SubItems[4].Text;
                    if (e.Label == null)
                        return;

                    FileInfo fi = new FileInfo(currpath);
                    if (fi.Exists)
                    {
                        //string path2=fi.DirectoryName + "\\" + e.Label;
                        FileSystem.RenameFile(currpath, e.Label);
                        
                        DirectoryInfo Folder = new DirectoryInfo(fi.DirectoryName);
                        DuyetFoldersVaFiles(Folder, listView1);
                        e.CancelEdit = true;

                    }
                    else
                    {
                        //DirectoryInfo di=new DirectoryInfo(path);
                        //string newdir=di.Parent + "\\" + e.Label;

                        FileSystem.RenameDirectory(currpath, e.Label);
                        string parent= FileSystem.GetParentPath(currpath);
                        DirectoryInfo rootDir2 = new DirectoryInfo(parent);
                        //listView1.Items.Remove(curr);
                        DuyetFoldersVaFiles(rootDir2, listView1);
                        e.CancelEdit = true;


                        
                        
                        
                    }
                }
                catch (IOException)
                {
                    MessageBox.Show("File hoac thu muc da ton tai !");
                }
                catch (Exception ex)
                {
                    ShowError(ex);
                }
                


            }
            flagNewFolder = false;
            flagRename=false;

           

        }


        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void WindowsExplorer_Load(object sender, EventArgs e)
        {
            tsSearch.Enabled = false;
            KhongTrung(); //ko cho trung lap trong history
            PopulateDriveList();
        }

        private void largeIconsToolStripMenuItem_Click(object sender, EventArgs e)
        {
            listView1.View = View.LargeIcon;
            
        }

        private void smallIconsToolStripMenuItem_Click(object sender, EventArgs e)
        {
            listView1.View = View.SmallIcon;
        }

        private void listToolStripMenuItem_Click(object sender, EventArgs e)
        {
            listView1.View = View.List;

        }

        private void detailToolStripMenuItem_Click(object sender, EventArgs e)
        {
            listView1.View = View.Details;

        }

        private void newFolderToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            newFolderToolStripMenuItem_Click(sender,e);

        }

        private void renameToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            flagRename = true;
            listView1.SelectedItems[0].BeginEdit();
            
        }

        

        private void tsbtnGo_Click(object sender, EventArgs e)
        {
            DirectoryInfo rootDir = new DirectoryInfo(tscbnAddress.Text);
            DuyetFoldersVaFiles(rootDir, listView1);
            path = tscbnAddress.Text;

        }

        

        private void renameToolStripMenuItem_Click(object sender, EventArgs e)
        {
            renameToolStripMenuItem1_Click(sender, e);
        }

        private void newToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void contextMenuStrip1_Opening(object sender, CancelEventArgs e)
        {

        }

        private void listView1_MouseClick(object sender, MouseEventArgs e)
        {
            flagRename = true;
            
        }


        public void DeleteItem(ListViewItem item, ListView lv)
        {
            try
            {
                string pathItem = item.SubItems[4].Text;
                if (item.SubItems[1].Text == "Folder")
                {
                    DirectoryInfo dir = new DirectoryInfo(pathItem);
                    if (!dir.Exists)
                    {
                        ShowErrorPath();
                        return;
                    }
                    else
                    {
                        DialogResult d = MessageBox.Show("CHU Y! Ban co muon xoa thu muc '" + item.Text.ToString() + "' va tat ca ben trong thu muc ko?", "Xac nhan xoa thu muc", MessageBoxButtons.YesNo, MessageBoxIcon.Question, MessageBoxDefaultButton.Button1);
                        if (d == DialogResult.Yes)
                        {
                            dir.Delete(true);
                        }
                        else return;
                        DuyetFoldersVaFiles(dir.Parent,listView1);
                    }

                }
                else
                {
                    FileInfo file = new FileInfo(pathItem);
                    if (!file.Exists)
                    {
                        ShowErrorPath();
                        return;
                    }
                    else
                    {
                        DialogResult dd = MessageBox.Show("Ban co muon xoa file '" + item.Text.ToString() + "'?", "Xac nhan xoa file", MessageBoxButtons.YesNo, MessageBoxIcon.Question, MessageBoxDefaultButton.Button1);
                        if (dd == DialogResult.Yes)
                        {
                            file.Delete();
                        }
                        else return;
                        //string filepath = file.FullName;
                        DirectoryInfo duyetfile = new DirectoryInfo(tscbnAddress.Text);
                        DuyetFoldersVaFiles(duyetfile, listView1);


                    }

                }
                
            }
            catch (Exception ex)
            {
                ShowError(ex);
            }
        }



        private void tsbtnDelete_Click(object sender, EventArgs e)
        {
            try
            {
                if (listView1.Focused)//delete o listview
                {
                    ListViewItem item = new ListViewItem();
                    item = listView1.FocusedItem;
                    DeleteItem(item, listView1);
                }
                //else//delete o treeview
                //{
                //    TreeNode dir = tvTreeView.SelectedNode;
                //    // string pathDir = dir.FullPath;
                //    string pathDir = cboPath.Text.Trim();
                //    if (!Microsoft.VisualBasic.FileIO.FileSystem.DirectoryExists(pathDir)) return;
                //    DialogResult d = MessageBox.Show("Are you sure want to remove the folder '" + dir.Text + "' and all its\ncontents?", "Confirm Folder Delete", MessageBoxButtons.YesNo, MessageBoxIcon.Question, MessageBoxDefaultButton.Button1);
                //    if (d == DialogResult.Yes)
                //    {
                //        Microsoft.VisualBasic.FileIO.FileSystem.DeleteDirectory(pathDir, Microsoft.VisualBasic.FileIO.DeleteDirectoryOption.DeleteAllContents);
                //        //Class.clsTreeView.CreateTreeView(tvTreeView);
                //        tvTreeView.Nodes.Remove(dir);
                //    }
                //    else return;

                //}
            }
            catch { }

            
        }

        private void deleteToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tsbtnDelete_Click(sender, e);
        }

        private void largeIconsToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            listView1.View = View.LargeIcon;

        }

        private void smallIconsToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            listView1.View = View.SmallIcon;
        }

        private void listToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            listView1.View = View.List;

        }

        private void detailsToolStripMenuItem_Click(object sender, EventArgs e)
        {
            listView1.View = View.Details;

        }

        private void deleteToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            tsbtnDelete_Click(sender, e);
        }

        public bool flagCopy;
        public bool flagDir;
        public string SourceDir;
        public string SourceFile;
        public string strDestDir;
        public string strDest;
        public string ItemName;
        //public string[] arrSourceDir;
        public ListViewItem item = new ListViewItem();


        private void copyToolStripMenuItem_Click(object sender, EventArgs e)
        {
            flagCopy = true;
            try
            {
                
                if (listView1.Focused)//copy o listview
                {

                    item = listView1.FocusedItem;
                    if (item.SubItems[1].Text.Trim() == "Folder")//copy folder
                    {
                        flagDir = true;
                        ItemName = item.Text;
                        SourceDir = tscbnAddress.Text + ItemName;
                        
                                               
                        
                    }
                    else//copy file
                    {
                        flagDir = false;
                        ItemName = item.Text;
                        SourceFile = tscbnAddress.Text + ItemName;
                        
                        
                    }
                }
                pasteToolStripMenuItem.Enabled = true;
                pasteToolStripMenuItem2.Enabled = true;
                //else //copy folder o treeview
                //{
                //    isDir = true;
                //    sourceDir = cboPath.Text.Trim();
                //    folder = tvTreeView.SelectedNode.Text;
                //    clsitem.strSrceDir = sourceDir;
                //}
                //cmnuPaste.Enabled = true;
                //cmnutvPaste.Enabled = true;
            }
            catch { }




        }

        private void copyToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            copyToolStripMenuItem_Click(sender, e);
        }

        private void pasteToolStripMenuItem_Click(object sender, EventArgs e)
        {
            //begin

            try
            {
                strDestDir = tscbnAddress.Text;
                strDest = strDestDir + ItemName;
                
                if (flagCopy)//copy/paste
                {
                    if (flagDir)
                    {
                        Microsoft.VisualBasic.FileIO.FileSystem.CopyDirectory(SourceDir, strDest);
                        //Class.clsTreeView.CreateTreeView(tvTreeView);
                    }
                    else
                    {
                        
                        Microsoft.VisualBasic.FileIO.FileSystem.CopyFile(SourceFile, strDest);
                    }
                }
                else //move/paste
                {
                    if (flagDir)
                    {
                        Microsoft.VisualBasic.FileIO.FileSystem.MoveDirectory(SourceDir, strDest);
                        //if (nodeCurrent != null) tvTreeView.Nodes.Remove(nodeCurrent);
                        //Class.clsTreeView.CreateTreeView(tvTreeView);
                    }
                    else
                    {
                        
                        Microsoft.VisualBasic.FileIO.FileSystem.MoveFile(SourceFile, strDest);
                    }
                }
            }
            catch (Exception ex) { MessageBox.Show(ex.Message); }
            DirectoryInfo dir = new DirectoryInfo(tscbnAddress.Text);
            DuyetFoldersVaFiles(dir, listView1);

            //end


        }

        private void cutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            flagCopy = false;

            try
            {

                if (listView1.Focused)//copy o listview
                {
                    item = listView1.FocusedItem;
                    item.ForeColor = Color.LightGray;
                        
                    

                    if (item.SubItems[1].Text.Trim() == "Folder")//copy folder
                    {
                        flagDir = true;
                        ItemName = item.Text;
                        SourceDir = tscbnAddress.Text + ItemName;
                        


                    }
                    else//copy file
                    {
                        flagDir = false;
                        ItemName = item.Text;
                        SourceFile = tscbnAddress.Text + ItemName;
                        

                    }
                }
                pasteToolStripMenuItem.Enabled = true;
                pasteToolStripMenuItem2.Enabled = true;
                //else //copy folder o treeview
                //{
                //    isDir = true;
                //    sourceDir = cboPath.Text.Trim();
                //    folder = tvTreeView.SelectedNode.Text;
                //    clsitem.strSrceDir = sourceDir;
                //}
                //cmnuPaste.Enabled = true;
                //cmnutvPaste.Enabled = true;
            }
            catch { }

        }

        private void pasteToolStripMenuItem2_Click(object sender, EventArgs e)
        {
            pasteToolStripMenuItem_Click(sender, e);

        }

        private void cutToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            cutToolStripMenuItem_Click(sender, e);
        }

        private void sbtnBack_ButtonClick(object sender, EventArgs e)
        {

        }

        private void sbtnFoward_ButtonClick(object sender, EventArgs e)
        {
            
        }

        public ListViewItem ItemDetail; 


        private void propertiesToolStripMenuItem_Click(object sender, EventArgs e)
        {
            ItemDetail = listView1.FocusedItem;
            Program.fproperties.ShowDialog();
            
        }

        private void propertiesToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            propertiesToolStripMenuItem_Click(sender, e);
        }

        private void tsbtnSearch_Click(object sender, EventArgs e)
        {
            tsSearch.Enabled = true;
        }

        private void tsbtnSearch2_Click(object sender, EventArgs e)
        {
            try
            {
                // Khi nguoi dung nhan vao tim kiem:

                // + Hien thi ra hop thoai FolderBrowserDialog, de chi den thu muc can tim

                FolderBrowserDialog fbd = new FolderBrowserDialog();
                fbd.ShowDialog();

                // Tao doi tuong tim kiem

                MySearch ms = new MySearch();
                // Goi ham tim kiem

                if (tstxtFileName.Text != "")
                {
                    ms.SearchFunc(tstxtFileName.Text, fbd.SelectedPath);
                }
                else
                {
                    MessageBox.Show("Khong Tim Thay Tap Tin Trong Thu Muc");
                }

                // Sau khi tim kiem thanh cong, hient hi ket qua ra ngoai Listview
                // Co the viet 1 ham hien thi o ben ngoai

                //truoc khi hien thi ket qua tim kiem thi clear trong list view

                listView1.Items.Clear();

                //hien thi cac folder vua tim dc voi cac thong tin can thiet

                string[] lvDataF = new string[5];

                for (int i = 0; i < ms._arrDir.Count; i++)
                {
                    //ListViewItem lvi = new ListViewItem();
                    //lvi.Text = ms._arrDir[i].Name;
                    //lvi.Tag = ms._arrDir[i].FullName;

                    lvDataF[0] = ms._arrDir[i].Name;
                    lvDataF[1] = "Folder";

                    lvDataF[2] = ms._arrDir[i].CreationTime.ToString();

                    lvDataF[3] = ms._arrDir[i].LastWriteTime.ToString();

                    lvDataF[4] = ms._arrDir[i].FullName;


                    ListViewItem lvi = new ListViewItem(lvDataF, 0);
                    lvi.ImageKey = "Folder";
                                    

                    listView1.Items.Add(lvi);
                }

                // hien thi files vua tim dc voi cac thong tin can thiet
                string[] lvData = new string[5];
                
                DateTime dtCreateDate, dtModifyDate;
                Int64 lFileSize = 0;

                for (int i = 0; i < ms._arrFile.Count; i++)
                {
                    
                    //lvi.Text = ms._arrFile[i].Name;
                    //lvi.Tag = ms._arrFile[i].FullName;
                    FileInfo file = ms._arrFile[i];

                    lFileSize = file.Length;
                    dtCreateDate = file.CreationTime;
                    dtModifyDate = file.LastWriteTime;

                    // Ghi dữ liệu vào Listview
                    lvData[0] = file.Name;
                    lvData[1] = FormatSize(lFileSize);

                    lvData[2] = FormatDate(dtCreateDate);

                    lvData[3] = FormatDate(dtModifyDate);
                    lvData[4] = file.FullName;

                    ListViewItem lvi = new ListViewItem(lvData, 0);

                    //hien thi icon cho tat ca cac file
                    #region hien thi icon
                    switch (file.Extension.ToUpper())
                    {
                        case ".TXT":
                        case ".DIZ":
                        case ".LOG":
                            lvi.ImageKey = "txt";
                            break;
                        case ".PDF":
                            lvi.ImageKey = "pdf";
                            break;
                        case ".HTM":
                        case "HTML.":
                            lvi.ImageKey = "htm";
                            break;
                        case ".DOC":
                            lvi.ImageKey = "word.ico";
                            break;
                        case ".EXE":
                            lvi.ImageKey = "exe";
                            break;
                        case ".JPG":
                        case ".BMP":
                            lvi.ImageKey = "bmp";
                            break;
                        case ".SLN":
                            lvi.ImageKey = "sln";
                            break;
                        case ".MP3":
                        case ".WAV":
                        case ".WMV":
                        case ".ASF":
                        case ".MPEG":
                        case ".AVI":
                            lvi.ImageKey = "music";
                            break;
                        case ".RAR":
                        case ".ZIP":
                            lvi.ImageKey = "rar.ico";
                            break;
                        case ".PPT":
                        case ".PPTX":
                            lvi.ImageKey = "ppt.ico";
                            break;
                        case ".MDB":
                            lvi.ImageKey = "access.ico";
                            break;
                        case ".XLS":
                        case ".XLSX":
                            lvi.ImageKey = "excel.ico";
                            break;
                        //case ".DLL":
                        //case ".REG":
                        case ".INI":
                        case ".INF":
                            lvi.ImageKey = "inf";
                            break;
                        case ".SWF":
                        case ".FLV":
                        case ".FLA":
                            lvi.ImageKey = "swf";
                            break;
                        default:
                            lvi.ImageKey = "File";
                            break;
                    }

                    #endregion

                                       

                    listView1.Items.Add(lvi);
                }
                tsSearch.Enabled = false;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void tsbtnCopyTo_Click(object sender, EventArgs e)
        {
            try
            {
                if (listView1.SelectedItems.Count == 0)
                {
                    MessageBox.Show("Vui long chon File hoac thu muc de copy!");
                }
                else
                {
                    FolderBrowserDialog fbd = new FolderBrowserDialog();
                    fbd.ShowDialog();

                    for (int i = 0; i < listView1.SelectedItems.Count; i++)
                    {
                        string pathcopy = listView1.SelectedItems[i].SubItems[4].Text;
                        if (Directory.Exists(pathcopy))
                        {
                            new Microsoft.VisualBasic.Devices.Computer().FileSystem.CopyDirectory(pathcopy, fbd.SelectedPath + @"\" + Path.GetFileName(pathcopy));

                        }
                        else
                        {
                            FileSystem.CopyFile(pathcopy, fbd.SelectedPath + @"\" + Path.GetFileName(pathcopy));
                        }
                    }
 
                }
                
            }
            catch (Exception ex)
            {
                ShowError(ex);
            }
        }

        private void tsbtnMoveTo_Click(object sender, EventArgs e)
        {
            try
            {
                if (listView1.SelectedItems.Count == 0)
                {
                    MessageBox.Show("Vui long chon File hoac thu muc de Move!");
                }
                else
                {
                    FolderBrowserDialog fbd = new FolderBrowserDialog();
                    fbd.ShowDialog();

                    if (fbd.SelectedPath != "")
                    {

                        for (int i = 0; i < listView1.SelectedItems.Count; i++)
                        {
                            string pathcopy = listView1.SelectedItems[i].SubItems[4].Text;
                            if (Directory.Exists(pathcopy))
                            {
                                new Microsoft.VisualBasic.Devices.Computer().FileSystem.MoveDirectory(pathcopy, fbd.SelectedPath + @"\" + Path.GetFileName(pathcopy));

                            }
                            else
                            {
                                FileSystem.MoveFile(pathcopy, fbd.SelectedPath + @"\" + Path.GetFileName(pathcopy));
                            }
                        }
                        DirectoryInfo di = new DirectoryInfo(tscbnAddress.Text);
                        DuyetFoldersVaFiles(di, listView1);
                    }
                    else
                    {
                        MessageBox.Show("ban chua chon duong dan !");
                    }

                }

            }
            catch (Exception ex)
            {
                ShowError(ex);
            }
        }

        private void sellectAllToolStripMenuItem_Click(object sender, EventArgs e)
        {
            for (int i = 0; i < listView1.Items.Count; i++)
            {
                listView1.Items[i].Selected = true;
            }

        }

        private void selectAllToolStripMenuItem_Click(object sender, EventArgs e)
        {
            sellectAllToolStripMenuItem_Click(sender, e);
        }

        private void moveToFolderToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tsbtnMoveTo_Click(sender, e);
        }

        private void copyToFolderToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tsbtnCopyTo_Click(sender, e);
        }

        private void copToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void moveToToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tsbtnMoveTo_Click(sender, e);
        }

        private void copyToToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tsbtnCopyTo_Click(sender, e);
        }

        



        

        
    }
}
