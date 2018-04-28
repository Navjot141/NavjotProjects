//
//  PhotoViewController.swift
//  mapproject
//
//  Created by Jinal on 2018-03-24.
//  Copyright © 2018 Jinal. All rights reserved.
//

import UIKit

class PhotoViewController: UIViewController {
    @IBOutlet weak var imageView: UIImageView!
    var photo: UIImage?
    override func viewDidLoad() {
        super.viewDidLoad()

        imageView.image = photo
        // Do any additional setup after loading the view.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    @IBAction func savePhoto(_ sender: UIButton) {
        if let photo = photo {
            UIImageWriteToSavedPhotosAlbum(photo,nil,nil,nil)
        }
    }
    
    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        // Get the new view controller using segue.destinationViewController.
        // Pass the selected object to the new view controller.
    }
    */

}
