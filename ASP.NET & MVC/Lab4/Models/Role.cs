using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace Lab4.Models
{
    public class Role
    {
        public int RoleId   { get; set; }

        [StringLength(100)]
        public string Name {  get;set; }

        public ICollection<User> Users { get; set; }
    }
}
