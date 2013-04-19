using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows.Forms;

namespace _07k1161_WindowsExplorer
{
    static class Program
    {
        public static _07k1161_WindowsExplorer.WindowsExplorer fmain;
        public static _07k1161_WindowsExplorer.frmProperties fproperties;
        //public static Windows_Explorer.Forms.frmMain fmain;
        //public static Forms.frmProperties fproperties;
        
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            fmain = new _07k1161_WindowsExplorer.WindowsExplorer();
            fproperties = new _07k1161_WindowsExplorer.frmProperties();
            Application.Run(fmain);
        }
    }
}
