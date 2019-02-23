package assignment4;

import java.util.Scanner;
import java.util.TreeMap;

public class Dictionary {

	TreeMap<String, Integer> dictionary;
	int count;

	public Dictionary(){
		dictionary = new TreeMap<String, Integer>();
		count = 0;
	}

	public boolean addFile(Scanner inFile){
		int i = 0;
		if (inFile != null){
			while (inFile.hasNext()){
				String words;
				words = inFile.next().toLowerCase().replaceAll("\\P{L}","");

				if(dictionary.containsKey(words)){
					i = 1 + dictionary.get(words).intValue();
					dictionary.put(words,i);
				} else {
					dictionary.put(words, 1);
				}			
			}
			return true;
		}
		return false;
	}

	public void addKeyboard(String word){
		int i = 0;

		if(dictionary.containsKey(word)){
			i = 1 + dictionary.get(word).intValue();
			dictionary.put(word,i);
			System.out.println(i);
		} else {
			dictionary.put(word, 1);
		}

	}

	public void wordCount(String word){
		String original =  word;
		word = word.toLowerCase();
		if(dictionary.containsKey(word)){

			
			
			System.out.println(original + " occurs " + dictionary.get(word).intValue() + " times");
		} else { System.out.println("Word is not in the Tree.."); }
	}

	public int nodeCount(){
		return dictionary.size();
	}
	public void clearDictionary(){
		dictionary.clear();
	}
}
