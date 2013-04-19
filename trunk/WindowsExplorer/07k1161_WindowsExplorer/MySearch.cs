using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;

namespace _07k1161_WindowsExplorer
{
    class MySearch
    {
        // Tao bien chua danh sach thu muc va tap tin tim kiem duoc
        // public thong tin nay ra de co the goi tu ben ngoai
        public List<FileInfo> _arrFile; // Chua Danh sach ca tap tin sau khi tim duoc
        public List<DirectoryInfo> _arrDir;//Chua Danh sach ca thu muc sau khi tim duoc



        public bool CompareString(string str1, string str2)
        {
            if (str2.IndexOf(str1) >= 0)
                return true;
            else
                return false;
        }
        // Ham tim kiem de quy
        public void Search(string file, string path)
        {
            //DriveInfo dir = new DriveInfo(path);
            DirectoryInfo dir = new DirectoryInfo(path);
            FileInfo[] arrFile = dir.GetFiles();
            for (int i = 0; i < arrFile.Length; i++)
            {
                if (CompareString(file, arrFile[i].Name))
                {
                    _arrFile.Add(arrFile[i]);
                }
            }
            DirectoryInfo[] arrDir = dir.GetDirectories();
            for (int i = 0; i < arrDir.Length; i++)
            {

                if (CompareString(file, arrDir[i].Name))
                {
                    _arrDir.Add(arrDir[i]);
                }

                Search(file, arrDir[i].FullName);
            }
        }


        // Tao mot ham tim kiem the goi tu ben ngoai

        public void SearchFunc(string file, string path)
        {

            // Khoi tao List chua danh sach File + Thu Muc
            _arrFile = new List<FileInfo>();
            _arrDir = new List<DirectoryInfo>();

            Search(file, path);

        }

    }
}
