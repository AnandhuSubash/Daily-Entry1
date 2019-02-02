using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace MvcDatabase.Models
{
    public class UserContext:DbContext
    {
        public UserContext()
            : base("mycon")
        {
            DropCreateDatabaseIfModelChanges<UserContext> d = new DropCreateDatabaseIfModelChanges<UserContext>();
            Database.SetInitializer<UserContext>(d);
        }

        public DbSet<user> users { get; set; }
    }
}