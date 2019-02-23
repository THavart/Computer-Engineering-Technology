using Microsoft.WindowsAzure.Storage;
using Microsoft.WindowsAzure.Storage.Blob;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Http;
using System.IO;
using Lab5.Models;

// For more information on enabling MVC for empty projects, visit http://go.microsoft.com/fwlink/?LinkID=397860

namespace Lab5.Controllers
{
    public class HomeController : Controller
    {
        private PhotoDataContext _context;

        /// <summary>
        /// 
        /// </summary>
        /// <param name="context"></param>
        public HomeController(PhotoDataContext context)
        {
            _context = context;
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult Index()
        {
            // if you get an error here be sure to run the script to generate the database
            // also, obviously make sure that sql server express is installed
            /*
                USE [master]                
                GO                
                CREATE DATABASE [AzureStorage]                
                GO                
                USE [AzureStorage]                
                CREATE TABLE Photos(
	                [PhotoId] [int] IDENTITY(1,1) NOT NULL,
	                [FileName] [nvarchar](2048) NOT NULL,
	                [Url] [nvarchar](2048) NOT NULL
                )
            */
            // if you still get an error after running the database script change the connection string in Startup.cs
            //
            // from @"Server=localhost;Database=AzureStorage;Trusted_Connection=True;MultipleActiveResultSets=true;";
            // to   @"Server=localhost\SQLEXPRESS;Database=AzureStorage;Trusted_Connection=True;MultipleActiveResultSets=true;";
            //
            // if you still get an error, find me :)

            return View(_context.Photos.ToList());
        }
        public IActionResult Questions()
        {
            return View();
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="files"></param>
        /// <returns></returns>
        [HttpPost]
        public async Task<IActionResult> UploadFileNow(ICollection<IFormFile> files)
        {
                
            // get your storage accounts connection string
            var storageAccount = CloudStorageAccount.Parse("DefaultEndpointsProtocol=https;AccountName=cst8359;AccountKey=ecMPpNU6vimZKMDTJG4seALrY7Kq7UJYjgl0/yLanXn857C8xtUJ2sF4ciB6wy9gg+e/YeYbRTaly2DVOxWhXQ==");

            // create an instance of the blob client
            var blobClient = storageAccount.CreateCloudBlobClient();

            // create a container to hold your blob (binary large object.. or something like that)
            // naming conventions for the curious https://msdn.microsoft.com/en-us/library/dd135715.aspx
            var container = blobClient.GetContainerReference("justinsphotostorage");
            await container.CreateIfNotExistsAsync();

            // set the permissions of the container to 'blob' to make them public
            var permissions = new BlobContainerPermissions();
            permissions.PublicAccess = BlobContainerPublicAccessType.Blob;
            await container.SetPermissionsAsync(permissions);
            
            // for each file that may have been sent to the server from the client
            foreach (var file in files)
            {
                try
                {
                    // create the blob to hold the data
                    var blockBlob = container.GetBlockBlobReference(file.FileName);
                    if (await blockBlob.ExistsAsync())
                        await blockBlob.DeleteAsync();

                    using (var memoryStream = new MemoryStream())
                    {
                        // copy the file data into memory
                        await file.CopyToAsync(memoryStream);

                        // navigate back to the beginning of the memory stream
                        memoryStream.Position = 0;

                        // send the file to the cloud
                        await blockBlob.UploadFromStreamAsync(memoryStream);
                    }

                    // add the photo to the database if it uploaded successfully
                    var photo = new Photo();
                    photo.Url = blockBlob.Uri.AbsoluteUri;
                    photo.FileName = file.FileName;

                    _context.Photos.Add(photo);
                    _context.SaveChanges();
                }
                catch
                {

                }
            }

            return RedirectToAction("Index");
        }
    }
}
