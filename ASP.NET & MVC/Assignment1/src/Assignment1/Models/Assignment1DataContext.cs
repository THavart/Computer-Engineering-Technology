using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Http;
using Microsoft.EntityFrameworkCore;

namespace Assignment1.Models
{
    // You may need to install the Microsoft.AspNetCore.Http.Abstractions package into your project
    public class Assignment1DataContext : DbContext
    {
        public Assignment1DataContext(DbContextOptions<Assignment1DataContext> options)
            : base(options)
        {

        }

        public DbSet<Role> Roles { get; set; }
        public DbSet<User> Users { get; set; }
        public DbSet<BlogPost> BlogPosts { get; set; }
        public DbSet<Comment> Comments { get; set; }
    }

}

   

