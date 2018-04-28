//
//  FiltersViewController.swift
//  mapproject
//
//  Created by Jinal on 2018-03-24.
//  Copyright © 2018 Jinal. All rights reserved.
//

import UIKit
protocol openfilter{
   func updateFilterValues(filterSettings: FilterinSettings)
    
}
struct FilterinSettings {
    var radius: Float
    var openNow: Bool
    var rank: RankBy
    
}

enum RankBy {
    case prominence
    case distance
    
    func description() -> String {
        switch self {
        case .prominence: return "Prominence"
        case .distance: return "Distance"
        }
    }
}

class FiltersViewController: UIViewController {
    @IBOutlet weak var rankByLabel: UILabel!
    
    
    
    @IBOutlet weak var radiusSlider: UISlider!
    @IBOutlet weak var pickerView: UIPickerView!
    let defaults = UserDefaults.standard
    let hasfilterdata : Bool = true
    var rankByDictionary: [RankBy] = [.prominence , .distance]
    var rankSelected: RankBy = .prominence
   // var labradius: Float! = Float()
    var radius: Float!
    var openNow: Bool = true
    var delegate : openfilter?
    
    override func viewDidLoad() {
        super.viewDidLoad()
        radius = radiusSlider.value
        pickerView.delegate = self as UIPickerViewDelegate
        rankByLabel.text = rankSelected.description()
        pickerView.isHidden = true
        // Do any additional setup after loading the view.
        
        let tapGestureRecognizer = UITapGestureRecognizer(target: self, action: #selector(togglePickerView))
        tapGestureRecognizer.numberOfTapsRequired = 2
        rankByLabel.addGestureRecognizer(tapGestureRecognizer)
        rankByLabel.isUserInteractionEnabled = true
        
    }
    @objc func togglePickerView(){
        pickerView.isHidden = !pickerView.isHidden
    }
    
    @IBAction func ApplyButtonaction(_ sender: Any) {
        let filterSettings = FilterinSettings(radius: radius, openNow: openNow, rank: rankSelected)
           delegate?.updateFilterValues(filterSettings: filterSettings)

         dismiss(animated: true, completion: nil)
    }
    
    @IBAction func cancelButtonAction(_ sender: UIBarButtonItem) {
        self.dismiss(animated: true, completion: nil)
    }
    @IBAction func openNowChanged(_ sender: UISwitch) {
        //print(sender.isOn)
        
        if sender.isOn{
            openNow = true
            defaults.set( openNow, forKey: "openNow")
        }
        if sender.isOn == false {
            openNow = false
            defaults.set(openNow, forKey: "openNow")
        }

    }
    
        @IBAction func sliderDragged(_ sender: UISlider) {
         //  sender.value
        
        print(sender.value)
    }
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
}
    
    extension FiltersViewController: UIPickerViewDataSource, UIPickerViewDelegate {
        
        func numberOfComponents(in pickerView: UIPickerView) -> Int {
            return 1
        }
        
        func pickerView(_ pickerView: UIPickerView, numberOfRowsInComponent component: Int) -> Int {
            return rankByDictionary.count
        }
        
        public func pickerView(_ pickerView: UIPickerView, titleForRow row: Int, forComponent component: Int) -> String? {
            return rankByDictionary[row].description()
        }
        
        func pickerView(_ pickerView: UIPickerView, didSelectRow row: Int, inComponent component: Int) -> Void {
            self.rankSelected = rankByDictionary[row]
            rankByLabel.text = rankSelected.description()
        }
    
}
