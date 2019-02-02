using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace MvcDatabase.Models
{
    public class user
    {
        public int Id{get;set;}

        [Required(ErrorMessage="Enter name"),MaxLength(30)]
        [DataType(DataType.Text)]
        [Display(Name="Student Name")]
        public string name
        {
            get;
            set;
        }
        [Required(ErrorMessage="Enter username"),MaxLength(30)]
        [DataType(DataType.Text)]
        [Display(Name="User Name")]
        public string username
        {
            get;
            set;
        }
        [Required(ErrorMessage="Enter Password"),MaxLength(30)]
        [DataType(DataType.Text)]
        public string password
        {
        get;
        set;
         }
    }
}