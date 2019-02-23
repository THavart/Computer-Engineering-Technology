using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace Lab4.Models
{
    public class User
    {
        public int UserId
        {
            get;
            set;
        }
        [Range(1, 2)]
        [ForeignKey("RoleId")]
        public int RoleId {  get;  set; }
        public Role Role { get; set; }


        [Required]
        [StringLength(100)]
        public string FirstName
        {
            get;
            set;
        }
        [Required]
        [StringLength(100)]
        public string LastName
        {
            get;
            set;
        }
        [Required]
        [StringLength(100)]
        public string EmailAddress   {  get;  set; }
        [Required]
        [StringLength(100)]
        public string Password   {   get;   set; }

        public ICollection<BlogPost> BlogPosts { get; set; }
        public ICollection<Comment> Comments { get; set; }



    }
}
